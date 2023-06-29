<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TurnoMail extends Mailable
{
    use Queueable, SerializesModels;

    private $turno;

    public function __construct($turno)
    {
        $this->turno = $turno;
    }
    public function build()
    {
        $actual = $this->turno;
        return $this->subject("Solicitud Turno Licencia de Conducir")->view('mail', compact('actual'));
    }
}
