<?php 
namespace App\DTOs\Image;

class ImageDto
{
    public function __construct(
        public readonly string $imageable_id,
        public readonly string $imageable_type,
        public readonly string $path,
        public readonly ?string $url,
        public readonly ?string $mime_type,
        )
    {
    }
}



?>