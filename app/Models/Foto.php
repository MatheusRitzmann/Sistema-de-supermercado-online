<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    // Defina os campos preenchíveis
    protected $fillable = ['nome_arquivo', 'produto_id'];

    // Relação com o modelo Produto
    public function produto()
    {
        return $this->belongsTo(Produto::class); // Cada foto pertence a um produto
    }
}

