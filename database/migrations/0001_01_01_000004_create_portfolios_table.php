<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_profile_id')->constrained()->cascadeOnDelete();
            $table->string('project_title', 200);
            $table->text('project_description');
            $table->string('project_url', 255)->nullable();
            $table->string('github_url', 255)->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->string('verification_status', 20)->default('pending');
            $table->timestamps();
            $table->softDeletes();

            $table->index('verification_status');
            $table->index('project_title');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
