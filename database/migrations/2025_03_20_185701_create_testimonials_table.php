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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('testimonialable');
            $table->string('customer_name');
            $table->string('customer_position')->nullable();
            $table->string('customer_company')->nullable();
            $table->text('comment');
            $table->decimal('rating', 3, 1)->default(5.0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->foreignId('created_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
