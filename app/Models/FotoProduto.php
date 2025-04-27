<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProduto extends Model
{
    use HasFactory;

    protected $fillable = ['arquivo', 'produto_id'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}