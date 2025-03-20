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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('version')->nullable();
            $table->date('release_date')->nullable();
            $table->json('tech_stack')->nullable()->comment('JSON array of technologies used');
            $table->json('system_requirements')->nullable()->comment('JSON array of system requirements');
            $table->longText('installation_guide')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('documentation_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('support_email')->nullable();
            $table->date('support_expires_at')->nullable();
            $table->boolean('lifetime_updates')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
