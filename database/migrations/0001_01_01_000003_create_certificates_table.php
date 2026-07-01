<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_profile_id')->constrained()->cascadeOnDelete();
            $table->string('certificate_name', 200);
            $table->string('organizer', 150);
            $table->date('issue_date');
            $table->date('expiry_date')->nullable();
            $table->string('credential_url', 255)->nullable();
            $table->string('file_path', 255);
            $table->string('verification_status', 20)->default('pending');
            $table->timestamps();
            $table->softDeletes();

            $table->index('issue_date');
            $table->index('verification_status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
