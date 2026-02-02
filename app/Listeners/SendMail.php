<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\verifyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
      
       Mail::to($event->user->email)->send(new verifyMail($event->user));
    }
}
