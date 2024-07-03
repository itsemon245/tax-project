<?php

namespace App\Interfaces\Services;

interface BaseServiceInterface {
    public function store($dto);

    public function update($dto, $model);

    public function delete($model);
}
