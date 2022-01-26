<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class registermail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $clg_mail = $this->data;
        return $this->view('backend.university.college.registration_mail',compact('clg_mail'));
    }
}
