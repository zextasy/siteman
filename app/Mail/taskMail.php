<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class taskMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tasks;
    public $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tasks, $user)
    {
        //
        $this->tasks = $tasks;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.admins.taskAlert')->subject($this->tasks->task_name);
    }
}
