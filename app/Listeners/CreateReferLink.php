<?php

namespace App\Listeners;

class CreateReferLink {
    /**
     * Create the event listener.
     */
    public function __construct() {
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void {
        $event->user->update([
            'refer_link' => url('/register/r/'.$event->user->user_name),
        ]);
    }
}
