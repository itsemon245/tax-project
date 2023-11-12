<?php
namespace App\Services\CustomService;

use App\DTOs\CustomService\CustomServiceDto;
use App\Interfaces\Services\BaseServiceInterface;
use App\Models\CustomService;

class CustomServiceService
{

    public function store(CustomServiceDto $dto)
    {
        return CustomService::create([
            'page_name'   => $dto->page_name,
            'title'       => $dto->title,
            'description' => $dto->description,
            'link'        => $dto->link
        ]);
    }
    public function update(CustomServiceDto $dto, $customService)
    {

        return tap($customService)->update([
            'page_name'   => $dto->page_name,
            'title'       => $dto->title,
            'description' => $dto->description,
            'link'        => $dto->link
        ]);
    }
    public function delete($customService)
    {
        return $customService->delete();
    }
}

?>