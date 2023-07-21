<?php

namespace App\Models;

use App\Models\PromoCode;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referees()
    {
        return $this->hasMany(Referee::class);
    }
    public function promoCodes()
    {
        return $this->hasMany(PromoCode::class);
    }
    public function userDocs()
    {
        return $this->hasMany(UserDoc::class);
    }
    public function notification()
    {
        return $this->hasMany(UserNotification::class);
    }
    public function authentications()
    {
        return $this->hasMany(Authentication::class);
    }
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

    /**
     * Returns items that user has purchased based on the item model
     * @return array
     */
   public function purchased(string $modelName){
    $modelName = str($modelName)->singular();
    $modelName = str($modelName)->studly();
    $items = $this->purchases()->where('purchasable_type', "App\\Models\\$modelName")->get()->map(function ($purchase){
        return $purchase->purchasable;
    });
    return $items;
   }
}
