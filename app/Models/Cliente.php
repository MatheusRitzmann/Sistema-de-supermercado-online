<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'data_nascimento',
        'telefone',
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
    public function cliente()
{
    return $this->hasOne(Cliente::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
}