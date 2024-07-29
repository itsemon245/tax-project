<?php

namespace App\Traits;

use App\DTOs\Image\ImageDto;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HasImage {
    protected string $disk = 'public';
    protected string $imageableType = __CLASS__;

    public function image(): MorphOne {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images(): MorphMany {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function saveImage(UploadedFile $image, ?string $dir = null, ?string $prefix = null, ?string $disk = null) {
        $dir = $dir ?? $this->getBaseDir();
        $prefix = $prefix ?? $this->getPrefix();
        $disk = $disk ?? $this->disk;
        $path = $this->storeOnDisk($image, $dir, $prefix, $disk);
        $imageDto = new ImageDto(
            imageable_id: $this->id,
            imageable_type: $this->imageableType,
            path: $path,
            url: asset('storage/'.$path),
            mime_type: $image->extension()
        );
        $image = $this->storeOnDatabase($imageDto);

        return $image;
    }

    public function updateImage(UploadedFile $image, ?string $path, ?string $dir = null, ?string $prefix = null, ?string $disk = null) {
        $dir = $dir ?? $this->getBaseDir();
        $prefix = $prefix ?? $this->getPrefix();
        $disk = $disk ?? $this->disk;
        if ($this->image) {
            $this->deleteImageFromDisk($path, $disk);
            $path = $this->storeOnDisk($image, $dir, $prefix, $disk);
            $image = $this->image()->update([
                'path' => $path,
                'url' => asset('storage/'.$path),
                'mime_type' => $image->extension(),
            ]);
        }

        return true;
    }

    public function deleteImageFromDisk(string $path, ?string $disk = null) {
        $disk = $disk ?? $this->disk;
        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }

    public function deleteImage(?string $path = null, ?string $disk = null): void {
        if (null == $path) {
            $path = $this->image->path;
        }
        if ($path) {
            $this->deleteImageFromDisk($path, $disk);
        }
        $this->image()->delete();
    }

    public function getPrefix(): string {
        return Str::kebab(class_basename($this));
    }

    public function setPrefix(string $prefix): self {
        $this->prefix = $prefix;

        return $this;
    }

    public function getBaseDir(): string {
        return 'uploads/'.$this->getPrefix();
    }

    public function setBaseDir(string $baseDir): self {
        $this->baseDir = $baseDir;

        return $this;
    }

    public function getImageableType(): string {
        return $this->imageableType;
    }

    public function setImageableType(string $imageableType): self {
        $this->imageableType = $imageableType;

        return $this;
    }

    protected function getTimestamp(): string {
        return Carbon::now()->format('Y-m-d-H-m-s-u');
    }

    protected function storeOnDisk(UploadedFile $file, string $dir, string $prefix, string $disk): string {
        return $file->storeAs($dir, $this->getName($file), $disk);
    }

    protected function getName(UploadedFile $file): string {
        $ext = '.'.$file->extension();
        $name = $this->getPrefix().'-'.$this->getTimestamp().$ext;

        return $name;
    }

    protected function storeOnDatabase(ImageDto $dto): Image {
        return Image::create([
            'imageable_id' => $dto->imageable_id,
            'imageable_type' => $dto->imageable_type,
            'path' => $dto->path,
            'url' => $dto->url,
            'mime_type' => $dto->mime_type,
        ]);
    }
}
