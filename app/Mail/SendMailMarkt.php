<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailMarkt extends Mailable
{
    use Queueable, SerializesModels;

    public $smailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($smailData)
    {
        $this->smailData = $smailData;


    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject($this->smailData['chamado'])->view('emails.markting');
    }
}
