<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddmisionConfirmationMAil extends Mailable
{
    use Queueable, SerializesModels;

   
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
        $adminssionMain = $this->data;
        return $this->view('frontend.addmission.addmission_mail', compact('adminssionMain'));
    }
}
