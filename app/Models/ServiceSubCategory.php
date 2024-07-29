<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model {
    use HasFactory;

    public function services() {
        return $this->hasMany(Service::class);
    }

    public function serviceCategory() {
        return $this->belongsTo(ServiceCategory::class);
    }
}
