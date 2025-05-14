<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'descricao', 'preco', 'categoria_id',
    ];

    // Relação com a tabela 'fotos'
    public function fotos()
    {
        return $this->hasMany(Foto::class);  // Foto é o modelo que representa a tabela 'fotos'
    }
}
