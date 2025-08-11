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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name', 191)->index()->nullable();
            $table->string('last_name', 191)->index()->nullable();
            $table->text('about')->nullable();
            $table->string('public_email', 191)->index()->nullable();
            $table->string('public_phone', 20)->index()->nullable();
            $table->string('fb', 191)->index()->nullable(); // Facebook
            $table->string('ig', 191)->index()->nullable(); // Instagram
            $table->string('tk', 191)->index()->nullable(); // TikTok
            $table->string('yt', 191)->index()->nullable(); // YouTube
            $table->string('fm', 191)->index()->nullable(); // Facebook Messenger
            $table->string('wa', 191)->index()->nullable(); // WhatsApp
            $table->string('tg', 191)->index()->nullable(); // Telegram
            $table->string('li', 191)->index()->nullable(); // LinkedIn
            $table->string('th', 191)->index()->nullable(); // Threads
            $table->string('tw', 191)->index()->nullable(); // X (formerly Twitter)
            $table->string('wb', 191)->index()->nullable(); // Website
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
