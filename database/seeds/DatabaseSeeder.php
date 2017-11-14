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
                'categoria_id' => 2
            ],
            [
                'nome' => 'Liderança de equipes',
                'descricao' => 'Curso sobre técnicas para melhor liderar equipes.',
                'categoria_id' => 1
            ]
        ]);
    }
}
