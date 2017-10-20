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
            $table->string('email',250);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


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
