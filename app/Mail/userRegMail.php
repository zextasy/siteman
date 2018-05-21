<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class userRegMail extends Mailable
{
    use Queueable, SerializesModels;


    public $human;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($human)
    {
        //
        $this->human = $human;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.admins.registration');
    }
}
