<?php
namespace App\Traits;

use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Str;
use App\DTOs\Image\ImageDto;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasImage
{
    protected string $disk = 'public';
    protected string $imageableType = __CLASS__;

    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    public function saveImage(UploadedFile $image, string $dir = null, ?string $prefix = null, ?string $disk = null)
    {
        $dir = $dir ?? $this->getBaseDir();
        $prefix = $prefix ?? $this->getPrefix();
        $disk = $disk ?? $this->disk;
        $path = $this->storeOnDisk($image, $dir, $prefix, $disk);
        $imageDto = new ImageDto(
            imageable_id: $this->id,
            imageable_type: $this->imageableType,
            path: $path,
            url: asset('storage/' . $path),
            mime_type: $image->extension()
        );
        $image = $this->storeOnDatabase($imageDto);
        return $image;
    }


    public function deleteImage(string $path, ?string $dir = null, ?string $prefix = null, ?string $disk = null)
    {
    //TODO Delete operation for image
    }


    protected function getTimestamp() : string
    {
        return Carbon::now()->format('Y-m-d-H-m-s-u');
    }

    protected function storeOnDisk(UploadedFile $file, string $dir, string $prefix, string $disk) : string
    {
        return $file->storeAs($dir, $this->getName($file), $disk);
    }

    protected function getName(UploadedFile $file) : string
    {
        $ext = "." . $file->extension();
        $name = $this->getPrefix() . "-" . $this->getTimestamp() . $ext;
        return $name;
    }

    protected function storeOnDatabase(ImageDto $dto) : Image
    {
        return Image::create([
            'imageable_id'   => $dto->imageable_id,
            'imageable_type' => $dto->imageable_type,
            'path'           => $dto->path,
            'url'            => $dto->url,
            'mime_type'      => $dto->mime_type,
        ]);
    }

    /**
     * @return string
     */
    public function getPrefix() : string
    {

        return Str::kebab(class_basename($this));

    }

    /**
     * @param string $prefix 
     * @return self
     */
    public function setPrefix(string $prefix) : self
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseDir() : string
    {
        return "uploads/" . $this->getPrefix();
    }

    /**
     * @param string $baseDir 
     * @return self
     */
    public function setBaseDir(string $baseDir) : self
    {
        $this->baseDir = $baseDir;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageableType() : string
    {
        return $this->imageableType;
    }

    /**
     * @param string $imageableType 
     * @return self
     */
    public function setImageableType(string $imageableType) : self
    {
        $this->imageableType = $imageableType;
        return $this;
    }
}



?>