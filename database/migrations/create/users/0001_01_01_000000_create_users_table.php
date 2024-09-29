<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('bio')->nullable();
            $table->enum('gender', ['male', 'female', 'diverse'])->nullable(); // https://www.antidiskriminierungsstelle.de/EN/about-discrimination/grounds-for-discrimination/gender-and-gender-identity/third-option/third-option-node.html
            $table->date('birthday')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('centimeters')->nullable();
            $table->string('avatar')->default('avatar.png');
            $table->enum('role', ['user', 'dba', 'teacher', 'admin'])->default('user');
            $table->boolean('is_active')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }
};
