<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailContato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensagem)
    {
        $this->mensagem=$mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mensagem=$this->mensagem;
        return $this->view('emails.contato', compact('mensagem'));
    }
}
