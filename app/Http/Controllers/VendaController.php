<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VendaController extends Controller
{
    public function lancarNovaVenda(Request $request)
    {
        try {
            $vendedor_id = $request->input('vendedor_id');
            $valor_da_venda = $request->input('valor_da_venda');
            $vendedor = Vendedor::find($vendedor_id);
            $nome_vendedor = $vendedor ? $vendedor->nome : 'Vendedor Desconhecido';
            $email_vendedor = $vendedor ? $vendedor->email : 'vendedor@dominio.com';
            $comissao = $valor_da_venda * 0.085;
    
            $venda = Venda::create([
                'vendedor_id' => $vendedor_id,
                'nome' => $nome_vendedor,
                'email' => $email_vendedor, 
                'valor_da_venda' => $valor_da_venda,
                'comissao' => $comissao,
                'data_da_venda' => now()->toDateString(),
            ]);
            return response()->json($venda, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function listarVendas()
    {
        $vendas = Venda::all();
        return response()->json($vendas);
    }
}