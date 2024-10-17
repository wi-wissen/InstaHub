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
        Schema::dropIfExists('ads');

        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('priority');
            $table->string('name');
            $table->enum('type', ['banner', 'photo']);
            $table->string('url');
            $table->string('img');
            $table->longText('query');
            $table->timestamps();
        });
    }
};
