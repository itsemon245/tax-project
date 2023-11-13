<?php
namespace App\DTOs\CustomService;
use App\Enums\PageName;
use App\Http\Requests\CustomService\CustomServiceRequest;

class CustomServiceDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $link,
        public readonly string $page_name,

    ) {
    }

    public static function transformRequest(CustomServiceRequest $request) : self
    {
        return new self(
            $request->title,
            $request->description,
            $request->link,
            $request->page_name,
        );
    }

}


?>