<?php

namespace App\Notifications;

use App\Models\PromoCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PromoCodeNotification extends Notification implements ShouldQueue {
    use Queueable;
    public string $url;

    /**
     * Create a new notification instance.
     */
    public function __construct(public PromoCode $promoCode, ?string $url = null) {
        if (null === $url) {
            $url = route('page.promo.code');
        }
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return ($notifiable->email_verified_at ?? true) ? ['mail', 'database'] : ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage {
        return (new MailMessage())
            ->greeting('Hurray!')
            ->line('You got a new Promo Code')
            ->action('View Promo Codes', $this->url)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array {
        return [
            'promo_code_id' => $this->promoCode->id,
            'title' => 'New Promo Code',
            'body' => 'You have received a new promo code',
            'url' => $this->url,
        ];
    }
}
