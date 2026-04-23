<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{

    protected $table = 'produtos';
    protected $fillable = [
        'nome',
        'fornecedor',
        'categoria',
        'quantidade_estoque',
        'estoque_minimo',
        'descricao'

    ];
    public function estoqueBaixo()
    {
        return $this->quantidade <= $this->estoque_minimo;
    }
    use HasFactory;
}
