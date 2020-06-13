<?php

namespace App\Mail;

use App\HealthCareProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $healthProvider;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HealthCareProvider $healthProvider){
        $this->healthProvider =$healthProvider;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        return $this->from('notifications@dmw.com','DMW System')
            ->subject('Email Verification')
            ->view('health_provider.mail.verification');
    }



}
