<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_recommendations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_profile_id')->constrained()->cascadeOnDelete();
            $table->string('recommendation_type', 50);
            $table->string('title', 200);
            $table->text('description');
            $table->smallInteger('priority')->default(1);
            $table->string('status', 20)->default('active');
            $table->timestamp('generated_at');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index('priority');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_recommendations');
    }
};
