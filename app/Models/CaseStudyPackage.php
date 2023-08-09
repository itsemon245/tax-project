<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseStudyPackage extends Model
{
    use HasFactory;

    /**
     * Interact with the user's first name.
     */
    protected function billingType(): Attribute
    {
        return Attribute::make(
            get: function (string $value) 
            {
                if ($value==='onetime') {
                    $value= 'lifetime';
                }
                return str($value)->title();
            },
            set: fn (string $value) => strtolower($value),
        );
    }
}
