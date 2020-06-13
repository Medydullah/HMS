<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Mail\UserRegistrationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserRegisteredEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event){
        Log::info(" User Added,  
        email: ". $event->user->email ."
        PWD: " . $event->user->plain_password );

        Mail::to($event->user->email)->send(new UserRegistrationMail($event->user));

    }
}
