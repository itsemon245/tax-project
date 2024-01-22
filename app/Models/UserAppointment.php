<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function map()
    {
        return $this->belongsTo(Map::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function expertProfile()
    {
        return $this->belongsTo(ExpertProfile::class);
    }
    protected static function booted(): void
    {
        // static::created(function (UserAppointment $userAppointment) {
        //     $event = new Calendar();
        //     $event->title = "Appointment Created";
        //     $event->client_id = $userAppointment->client;
        //     $event->service = $userAppointment->name;
        //     $event->type = 'others';
        //     $event->start = $userAppointment->start_date;
        //     $event->description = $userAppointment->event_description;
        //     $event->save();
        // });
    }
}
