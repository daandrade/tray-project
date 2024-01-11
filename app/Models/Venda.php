<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = ['vendedor_id', 'nome', 'email', 'valor_da_venda', 'comissao', 'data_da_venda'];
   
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id');
    }

    
    public function getDataDaVendaAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}