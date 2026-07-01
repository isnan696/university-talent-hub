<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_profile_id')->constrained()->cascadeOnDelete();
            $table->uuidMorphs('verifiable');
            $table->string('status', 20)->default('pending');
            $table->foreignUuid('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('status');
        });

        Schema::create('verification_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('verification_id')->constrained()->cascadeOnDelete();
            $table->string('previous_status', 20)->nullable();
            $table->string('current_status', 20);
            $table->foreignUuid('changed_by')->constrained('users');
            $table->text('notes')->nullable();
            $table->timestamp('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verification_logs');
        Schema::dropIfExists('verifications');
    }
};
