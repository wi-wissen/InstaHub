<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table)
        {
            $table->increments('id'); // Deletion dont work without id i guess in laravel :/
            $table->integer('photo_id');
            $table->integer('user_id'); // Id of the user who liked the photo
            $table->timestamps(); // Updated_at and Created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
