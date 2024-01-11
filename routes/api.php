<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VendaController;




Route::post('/vendedores', [VendedorController::class, 'criarVendedor']);
Route::get('/vendedores', [VendedorController::class, 'obterVendedores']);
Route::get('/vendas', [VendaController::class, 'listarVendas']);
Route::post('/vendas', [VendaController::class, 'lancarNovaVenda']);
Route::get('/enviar-relatorio-vendas-diarias', [VendaController::class, 'enviarRelatorioVendasDiarias']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
