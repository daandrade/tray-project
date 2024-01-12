<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RelatorioComissaoDiaria extends Mailable
{
    use Queueable, SerializesModels;

    public $vendedorNome;
    public $comissaoTotal;

    public function __construct($vendedorNome, $comissaoTotal)
    {
        $this->vendedorNome = $vendedorNome;
        $this->comissaoTotal = $comissaoTotal;
    }

    public function build()
    {
        return $this->view('emails.comissao-diaria');
    }
}
