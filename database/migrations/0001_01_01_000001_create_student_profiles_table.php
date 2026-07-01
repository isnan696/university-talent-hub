<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('nim', 30)->unique();
            $table->string('program_studi', 100);
            $table->smallInteger('angkatan');
            $table->string('phone', 20)->nullable();
            $table->text('bio')->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('github_url', 255)->nullable();
            $table->string('linkedin_url', 255)->nullable();
            $table->smallInteger('profile_completion')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('program_studi');
            $table->index('angkatan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
