<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model {
    use HasFactory;
    protected $guarded = [];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function clients(): BelongsToMany {
        return $this->belongsToMany(Client::class)->withPivot('is_completed');
    }

    public function isCompleted($clientId): bool {
        return $this->clients()
            ->where('client_id', $clientId)
            ->first()
            ->pivot->is_completed;
    }
}
