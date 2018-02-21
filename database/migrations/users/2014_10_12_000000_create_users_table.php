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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('bio')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('centimeters')->nullable();
            $table->string('avatar')->default('avatar.png');
            $table->enum('role', ['user', 'dba', 'teacher', 'admin'])->default('user')->after('avatar');
            $table->boolean('is_active')->default(false)->after('role');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
