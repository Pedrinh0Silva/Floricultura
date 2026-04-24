<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['nome' => 'Administrador', 'login' => 'admin', 'senha' => '123'],
            ['nome' => 'Professor', 'login' => 'prof', 'senha' => 'qwer'],
        ]);
    }
}