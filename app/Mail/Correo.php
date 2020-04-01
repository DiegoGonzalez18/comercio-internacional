<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Correo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    use Queueable, SerializesModels;

    public $correo;
    public $respuesta;

    public function __construct($correo,$respuesta)
    {
        $this->correo = $correo;
        $this->respuesta = $respuesta;
    }

    public function build()
    {
        return $this->view('correo');
    }
}
