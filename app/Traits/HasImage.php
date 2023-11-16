<?php
namespace App\Traits;

use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasImage
{
    protected string $disk = 'public';

    protected string $prefix = Str::kebab(class_basename($this));
    protected string $baseDir = 'uploads/' . $this->prefix;

    public function image() : MorphOne
    {
        return $this->morphOne(Image::class);
    }


    public function saveImage(UploadedFile $image, string $dir = null, ?string $prefix = null, ?string $disk = null)
    {
        $dir = $dir ?? $this->baseDir;
        $prefix = $prefix ?? $this->prefix;
        $disk = $disk ?? $this->disk;
        if ($image) {
            $ext = $image->extension();
            $name = $prefix . "-" . $this->getTimestamp() . '.' . $ext;
            $path = $image->storeAs($dir, $name, $disk);
            return $path;
        } else {
            return $image;
        }
    }


    public function getTimestamp() : string
    {
        return Carbon::now()->format('Y-m-d-H-m-s-u');
    }

    public function storeOnDisk(UploadedFile $file, string $dir, string $prefix, string $disk) : string
    {
        return $file->storeAs($dir, $this->getName($file), $disk);  
    }

    protected function getName(UploadedFile $file) : string {
        $ext = "." . $file->extension();
        $name = $this->prefix . "-" . $this->getTimestamp() . $ext;
        return $name;
    }

    public function storeOnDatabase(UploadedFile $file, string $path): void
    {
        
    }
}



?>