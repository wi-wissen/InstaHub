<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('likes');

        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id'); // Deletion dont work without id i guess in laravel :/
            $table->integer('photo_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('photo_id')
                ->references('id')->on('photos')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->timestamps(); // Updated_at and Created_at
        });
    }
};
