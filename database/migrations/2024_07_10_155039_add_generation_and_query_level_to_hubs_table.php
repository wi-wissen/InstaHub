<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('hubs', function (Blueprint $table) {
            $table->integer('generation')->default(1)->after('password');
            $table->enum('query_level', ['ai', 'gui', 'sql'])->default('gui')->after('generation');
        });
    }

    public function down()
    {
        Schema::table('hubs', function (Blueprint $table) {
            $table->dropColumn('generation');
            $table->dropColumn('query_level');
        });
    }
};