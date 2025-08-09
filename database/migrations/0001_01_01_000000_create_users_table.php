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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('referral_id')->default(0)->index()->unsigned();
            $table->string('name', 191)->unique();
            $table->string('email', 191)->unique();
            $table->string('phone', 191)->nullable()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('active')->default(1)->index()->unsigned();
            $table->tinyInteger('user_role')->default(0)->index()->unsigned();
            $table->string('img', 191)->nullable()->index();
            $table->date('birthday')->nullable()->index();
            $table->bigInteger('country_id')->default(0)->index()->unsigned();
            $table->bigInteger('city_id')->default(0)->index()->unsigned();
            $table->string('city_text', 191)->nullable()->index();
            $table->string('google_id')->index()->nullable();
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
