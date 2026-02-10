<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            DB::table('users')
                ->whereNull('email_verified_at')
                ->update([
                    'email_verified_at' => Carbon::now(),
                ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // no way back
    }
};
