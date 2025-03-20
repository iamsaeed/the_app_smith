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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable()->index()->comment('Type of category (blog, product, etc.)');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('bg')->default('#e2e8f0'); // Default background color
            $table->string('text')->default('#1e293b'); // Default text color
            $table->boolean('status')->default(true);
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('created_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        // Update existing categories to be blog type
        DB::table('categories')->update(['type' => 'blog']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
