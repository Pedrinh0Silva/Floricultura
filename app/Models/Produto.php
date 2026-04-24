<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'marca_fornecedor',
        'modelo_tipo',
        'categoria_id',
        'descricao',
        'caracteristicas',
        'quantidade_atual',
        'estoque_minimo',
    ];

    // O produto pertence a uma categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Um produto tem muitas movimentações (histórico)
    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }
}