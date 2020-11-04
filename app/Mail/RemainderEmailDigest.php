<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemainderEmailDigest extends Mailable
{
    use Queueable, SerializesModels;

    protected $remainders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($remainders)
    {
        $this->remainders = $remainders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.remainder-digest',[
            'remainders' => $this->remainders
        ]);
    }
}
