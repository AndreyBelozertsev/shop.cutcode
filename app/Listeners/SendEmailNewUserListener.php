<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNewUserListener
{
 
    public function handle(Registered $event)
    {
        $event->user->notify(new NewUserNotification());
    }
}
