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
        Schema::create('linkedin_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('linkedin_id');
            $table->string('access_token');
            $table->string('refresh_token')->nullable();
            $table->timestamp('expires_at');
            $table->timestamps();

            $table->index('linkedin_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linkedin_tokens');
    }
};
