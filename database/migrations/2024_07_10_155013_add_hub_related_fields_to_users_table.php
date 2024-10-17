<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_sponsor')->default(false)->after('is_active');
            $table->integer('hub_default_generation')->default(1)->after('is_sponsor');
            $table->enum('hub_default_creating', ['users', 'all_empty', 'all_full'])->default('users')->after('hub_default_generation');
            $table->enum('hub_default_query_level', ['ai', 'gui', 'sql'])->default('gui')->after('hub_default_creating');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('hub_default_generation');
            $table->dropColumn('is_sponsor');
            $table->dropColumn('hub_default_creating');
            $table->dropColumn('hub_default_query_level');
        });
    }
};