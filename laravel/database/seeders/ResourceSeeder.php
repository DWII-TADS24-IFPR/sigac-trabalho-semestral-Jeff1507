<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ADMINISTRADOR
            ["nome" => "administrador"],                    // 1
            ["nome" => "administrador.eixos"],              // 2
            ["nome" => "administrador.niveis"],             // 3
            ["nome" => "administrador.cursos"],             // 4
            ["nome" => "administrador.turmas"],             // 5
            ["nome" => "administrador.alunos"],             // 6
            ["nome" => "administrador.categorias"],         // 7
            ["nome" => "administrador.avaliar"],            // 8
            ["nome" => "administrador.graficos.alunos"],    // 9
            // ALUNO
            ["nome" => "aluno"],                            // 10
            ["nome" => "aluno.solicitar"],                  // 11
            ["nome" => "aluno.gerar"],                      // 12
        ];
        DB::table('resources')->insert($data);
    }
}
