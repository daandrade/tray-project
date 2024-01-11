<?php

namespace App\Http\Controllers;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function criarVendedor(Request $request)

    {

        $vendedor = Vendedor::create($request->all());

        return response()->json($vendedor, 201);

    }

    public function obterVendedores()
    {
        $vendedores = Vendedor::all();

        $vendedoresComComissao = $vendedores->map(function ($vendedor) {
            $vendas = $vendedor->vendas;

            if ($vendas) {
                $vendedor->comissao = $vendas->sum('valor') * 0.085;
            } else {
                $vendedor->comissao = 0; 
            }

            return $vendedor;
        });

        return response()->json($vendedoresComComissao);
    }
}