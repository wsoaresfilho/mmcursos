<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',250)->unique();
            $table->string('password');
            $table->enum('type', ['admin', 'user', 'teacher'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });


        // Denis, depois precisamos mover esse código abaixo pra uma "seed" ok?
        DB::table('users')->where('email', '=', 'dennisrojaspereira@gmail.com')->delete();
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'dennisrojaspereira@gmail.com',
            'password' => bcrypt('Usf123'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
