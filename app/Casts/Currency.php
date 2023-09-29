<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use NumberFormatter as NF;

class Currency implements CastsAttributes
{
    public $number;
    public function __construct()
    {
        $this->number = new NF('en_BD', NF::DEFAULT_STYLE);
    }
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $this->number->format($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (gettype($value) === 'string') {
            $number = new NF('en_BD', NF::CURRENCY);
            return $number->parse($value, NF::TYPE_INT64);
        }
        return $value;
    }
}
