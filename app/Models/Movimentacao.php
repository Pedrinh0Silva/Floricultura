<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    // O Laravel usa o nome da tabela no plural por padrão, 
    // como 'movimentacoes' é um plural irregular em inglês, vamos forçar o nome correto:
    protected $table = 'movimentacoes';

    protected $fillable = [
        'produto_id',
        'user_id',
        'tipo', // 'entrada' ou 'saida'
        'quantidade',
        'motivo'
    ];

    // A movimentação pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    // A movimentação foi feita por um usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}