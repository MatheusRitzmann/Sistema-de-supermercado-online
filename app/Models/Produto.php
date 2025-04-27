<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'descricao', 'preco', 'categoria_id', // adicione os campos conforme sua migration de produtos
    ];

    public function fotos()
    {
        return $this->hasMany(FotoProduto::class);
    }
}
