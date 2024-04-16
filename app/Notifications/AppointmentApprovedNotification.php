<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\UserAppointment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentApprovedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public ?UserAppointment $appointment)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $appointment = $this->appointment;
        $map = $appointment->map;
        $url = convertEmbedUrl($map->src);
        return (new MailMessage)
                    ->greeting("Dear {$appointment->name},")
                    ->line("Your appointment has been approved")
                    ->line("The Appointment will take place **"
                    . ($appointment->is_physical ? 'Physically': 'Virtually') . 
                    "** at **". $appointment->time. "** on **". Carbon::parse($appointment->date)->format('F d, Y')."**")
                    ->lineIf($appointment->is_physical, "The designation for the appointment is:")
                    ->lineIf($appointment->is_physical, "District: ". $map->district)
                    ->lineIf($appointment->is_physical, "Thana: ". $map->thana)
                    ->lineIf($appointment->is_physical, "Location: ". $map->location)
                    ->lineIf($appointment->is_physical, "Address: ". $map->address)
                    ->line('Thank you for choosing us')
                    ->line('Yours Faithfully,')
                    ->salutation(config('app.name'));
    }
}

   