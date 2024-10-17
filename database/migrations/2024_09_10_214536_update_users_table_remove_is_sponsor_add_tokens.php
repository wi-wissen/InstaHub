<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_sponsor');
            $table->bigInteger('tokens_used')->default(0)->after('hub_default_query_level');
            $table->bigInteger('tokens_max')->default(0)->after('tokens_used');
        });

        // Set tokens_max for existing users
        $maxTokens = config('azure.max_tokens');
        DB::table('users')->update(['tokens_max' => $maxTokens]);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_sponsor')->default(false);
            $table->dropColumn('tokens_used');
            $table->dropColumn('tokens_max');
        });
    }
};