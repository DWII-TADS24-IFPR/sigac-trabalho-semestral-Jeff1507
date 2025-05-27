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
            // MENU ADMINISTRADOR   ----------------------------
            ["nome" => "administrador"],                    // 1
            ["nome" => "administrador.cursos"],             // 2
            ["nome" => "administrador.eixos"],              // 3
            ["nome" => "administrador.niveis"],             // 4
            ["nome" => "administrador.alunos"],             // 5
            ["nome" => "administrador.avaliar"],            // 6
            ["nome" => "administrador.categorias"],         // 7
            ["nome" => "administrador.graficos.alunos"],    // 8
            ["nome" => "administrador.graficos.horas"],     // 9
            ["nome" => "administrador.relatorio"],          // 10
            ["nome" => "administrador.turmas"],             // 11
            ["nome" => "administrador.validar"],            // 12
            ["nome" => "administrador.cadastrar"],          // 13
            // MENU ALUNO           -----------------------------
            ["nome" => "aluno"],                            // 14
            ["nome" => "aluno.solicitar"],                  // 15
            ["nome" => "aluno.gerar"],                      // 16
        ];
        DB::table('resources')->insert($data);
    }
}
