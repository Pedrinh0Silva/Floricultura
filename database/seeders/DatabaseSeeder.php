<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Criar os Usuários Obrigatórios
        // Usamos Hash::make() para a senha funcionar com o sistema de login padrão do Laravel
        DB::table('users')->insert([
            ['name' => 'Administrador', 'login' => 'admin', 'password' => Hash::make('123')],
            ['name' => 'Professor', 'login' => 'prof', 'password' => Hash::make('qwer')],
        ]);

        // 2. Criar as Categorias
        $categorias = [
            'Flores Naturais',
            'Plantas Ornamentais',
            'Vasos e Cachepôs',
            'Adubos e Insumos'
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert(['nome' => $categoria]);
        }

        // 3. Criar os Produtos Obrigatórios
        DB::table('produtos')->insert([
            [
                'nome' => 'Rosa Vermelha Unidade',
                'marca_fornecedor' => 'Flores do Vale',
                'modelo_tipo' => 'Corte Natural',
                'categoria_id' => 1, // Flores Naturais
                'descricao' => 'Rosa vermelha fresca.',
                'caracteristicas' => 'Cor vermelha, com espinhos.',
                'quantidade_atual' => 30,
                'estoque_minimo' => 10,
            ],
            [
                'nome' => 'Orquídea Phalaenopsis',
                'marca_fornecedor' => 'Jardim Real',
                'modelo_tipo' => 'Vaso Médio',
                'categoria_id' => 2, // Plantas Ornamentais
                'descricao' => 'Orquídea em vaso, ideal para interiores.',
                'caracteristicas' => 'Flores brancas, não tolera sol direto.',
                'quantidade_atual' => 5,
                'estoque_minimo' => 3,
            ],
            [
                'nome' => 'Vaso de Cerâmica Branco',
                'marca_fornecedor' => 'Casa Verde',
                'modelo_tipo' => 'Tamanho Médio',
                'categoria_id' => 3, // Vasos e Cachepôs
                'descricao' => 'Vaso para plantas médias.',
                'caracteristicas' => 'Material cerâmica, cor branca.',
                'quantidade_atual' => 0,
                'estoque_minimo' => 4,
            ],
            [
                'nome' => 'Buquê de Girassóis',
                'marca_fornecedor' => 'Floratta',
                'modelo_tipo' => 'Arranjo Simples',
                'categoria_id' => 1, // Flores Naturais
                'descricao' => 'Lindo buquê.',
                'caracteristicas' => 'Contém 5 girassóis.',
                'quantidade_atual' => 8,
                'estoque_minimo' => 5,
            ],
            [
                'nome' => 'Adubo Orgânico 1kg',
                'marca_fornecedor' => 'Terra Forte',
                'modelo_tipo' => 'Granulado',
                'categoria_id' => 4, // Adubos e Insumos
                'descricao' => 'Adubo natural para plantas.',
                'caracteristicas' => 'Pacote de 1kg, não tóxico.',
                'quantidade_atual' => 4,
                'estoque_minimo' => 4,
            ]
        ]);
    }
}