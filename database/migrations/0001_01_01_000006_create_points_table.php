<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('points', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_profile_id')->unique()->constrained()->cascadeOnDelete();
            $table->integer('total_points')->default(0);
            $table->timestamp('last_updated')->nullable();
            $table->timestamps();

            $table->index('total_points');
        });

        Schema::create('point_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('student_profile_id')->constrained()->cascadeOnDelete();
            $table->string('source_type', 30);
            $table->uuid('source_id')->nullable();
            $table->integer('point_change');
            $table->text('description')->nullable();
            $table->timestamp('created_at');

            $table->index('source_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('point_histories');
        Schema::dropIfExists('points');
    }
};
