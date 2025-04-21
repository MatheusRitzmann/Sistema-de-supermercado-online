<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'logradouro',
        'numero',
        'bairro',
        'cidade_id',
        'cliente_id',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}