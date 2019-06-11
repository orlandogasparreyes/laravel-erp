<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Cliente;
use App\Promocion;

class OfertaEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $c;
    public $promocion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cliente $c, Promocion $promocion)
    {
        $this->c = $c;
        $this->promocion = $promocion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test');
    }
}
