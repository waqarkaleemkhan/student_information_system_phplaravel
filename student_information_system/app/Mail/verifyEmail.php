<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Profiles;
class verifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $subject = 'Student Information System - IIUI';
    public $passwordToSend;
    public function __construct($password)
    {

        $this->passwordToSend = $password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('admin.mail');
    }
}
