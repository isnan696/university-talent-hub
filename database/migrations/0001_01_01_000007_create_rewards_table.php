<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reward_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('rewards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('category_id')->constrained('reward_categories')->cascadeOnDelete();
            $table->string('title', 150);
            $table->text('description')->nullable();
            $table->integer('required_points')->default(0);
            $table->integer('stock')->default(0);
            $table->string('image', 255)->nullable();
            $table->string('status', 20)->default('active');
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('required_points');
        });

        Schema::create('reward_claims', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('reward_id')->constrained()->cascadeOnDelete();
            $table->integer('used_points');
            $table->string('status', 20)->default('pending');
            $table->timestamp('claimed_at');
            $table->timestamp('processed_at')->nullable();
            $table->foreignUuid('processed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reward_claims');
        Schema::dropIfExists('rewards');
        Schema::dropIfExists('reward_categories');
    }
};
