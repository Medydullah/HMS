<?php

namespace App\Mail;

use App\HealthCareEmployee;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HealthCareEmployeeVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $healthCareEmployee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HealthCareEmployee $healthCareEmployee){
        $this->healthCareEmployee =$healthCareEmployee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        return $this->from('notifications@dmw.com','DMW System')
            ->subject('Email Verification')
            ->view('expert.mail.verification');
    }
}
