<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // Inclusão de um admin padrão
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'type' => 'admin'
        ]);

        // Inclusão de um user padrão
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'type' => 'user'
        ]);

        // Inclusão de categorias
        DB::table('categorias')->insert([
            [
            'nome' => 'Gerência',
            'descricao' => 'Categoria de cursos voltados a gerentes.'
            ],
            [
            'nome' => 'Segurança',
            'descricao' => 'Categoria de cursos voltados a segurança do trabalho.'
            ]
        ]);

        // Inclusão de cursos
        DB::table('cursos')->insert([
            [
                'nome' => 'EPI',
                'descricao' => 'Curso sobre importância do uso de uso de EPI em ambientes de trabalho.',
                'url' => 'php.png',
                'categoria_id' => 2
            ],
            [
                'nome' => 'Liderança de equipes',
                'descricao' => 'Curso sobre técnicas para melhor liderar equipes.',
                'url' => 'python.png',
                'categoria_id' => 1
            ]
        ]);

        // Inclusão de cursos_users
        DB::table('cursos_users')->insert([
            [
                'curso_id' => 1,
                'user_id' => 2
            ],
            [
                'curso_id' => 2,
                'user_id' => 2
            ]
        ]);

        // Inclusão de conteudos
        DB::table('conteudos')->insert([
            [
                'nome' => 'Aula 1 de EPI',
                'descricao' => 'Primeira aula do curso de EPI.',
                'curso_id' => 1,
                'arquivo' => 'Diferença entre Liderança e Gestão.mp4'
            ],
            [
                'nome' => 'Aula 2 de EPI',
                'descricao' => 'Primeira aula do curso de EPI.',
                'curso_id' => 1,
                'arquivo' => 'Natureza é de Deus-Reflexão.mp4'
            ]
        ]);
    }
}
