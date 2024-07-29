<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model {
    use HasFactory;
    protected $guarded = [];

    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }

    public function clients(): BelongsToMany {
        return $this->belongsToMany(Client::class);
    }
}
