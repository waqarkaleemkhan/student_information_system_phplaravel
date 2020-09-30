<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Admin;
class verifyEmail2 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $numberToSend;
    public function __construct($number)
    {

        $this->numberToSend = $number;

    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->view('admin.mail2');
    }
}
