<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model {
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'completed_at' => 'date',
        'approved_at' => 'date',
    ];

    public function map() {
        return $this->belongsTo(Map::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function expertProfile() {
        return $this->belongsTo(ExpertProfile::class);
    }

    public function scopeApprovedOnly(Builder $builder) {
        $builder->whereNotNull('approved_at')
        ->whereNull('completed_at');
    }

    public function scopeCompletedOnly(Builder $builder) {
        $builder->whereNotNull('completed_at');
    }

    public function scopeUnapproved(Builder $builder) {
        $builder->whereNull('completed_at')
        ->whereNull('approved_at');
    }
}
