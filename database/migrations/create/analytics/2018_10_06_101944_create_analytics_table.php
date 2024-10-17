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
        Schema::dropIfExists('analytics');

        Schema::create('analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('device');
            $table->string('brand_family');
            $table->string('brand_model');
            $table->string('browser_family');
            $table->string('browser_version');
            $table->string('platform_family');
            $table->string('platform_version');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')
                ->references('id')->on('photos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }
};
