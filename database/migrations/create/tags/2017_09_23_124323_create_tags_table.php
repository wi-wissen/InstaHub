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
        Schema::dropIfExists('tags');

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')
              ->references('id')->on('photos')
              ->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }
};
