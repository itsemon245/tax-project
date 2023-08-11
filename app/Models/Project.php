<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }
}
