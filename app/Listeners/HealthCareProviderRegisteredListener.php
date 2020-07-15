<?php

namespace App\Listeners;

use App\Events\HealthCareEmployeeAdded;
use App\Events\HealthCareProviderRegistered;
use App\Mail\EmailVerificationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HealthCareProviderRegisteredListener
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
    public function handle(HealthCareProviderRegistered $providerRegisteredEvent){
         Log::info(" One HCEmployee Added,  
         email: ". $providerRegisteredEvent->healthCareProvider->email ."
         PWD: " . $providerRegisteredEvent->healthCareProvider->plain_password );

        //  Mail::to($providerRegisteredEvent->healthCareProvider->email)
        //     ->send(new EmailVerificationMail($providerRegisteredEvent->healthCareProvider));
    }
}


