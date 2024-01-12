<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RelatorioComissaoDiaria;
use App\Models\Venda;
use App\Models\Vendedor;

class EnviarEmailComissaoDiaria extends Command
{
    protected $signature = 'enviar:email-comissao-diaria';
    protected $description = 'Envia e-mail diário com a soma das comissões dos vendedores';

    public function handle()
    {
        $vendedores = Vendedor::all();

        foreach ($vendedores as $vendedor) {
            $comissaoTotal = Venda::where('vendedor_id', $vendedor->id)->sum('comissao');

            // Envie o e-mail
            Mail::to($vendedor->email)->send(new RelatorioComissaoDiaria($vendedor->nome, $comissaoTotal));
        }

        $this->info('E-mails de comissão diária enviados com sucesso!');
    }
}
