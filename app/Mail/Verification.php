<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Verification extends Mailable
{
    use Queueable, SerializesModels;

    private int $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $code)
    {
        $this->subject('Код аутентификации');
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verification')->with([
            'code' => $this->code
        ]);
    }
}
