<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 200);
            $table->string('category', 50);
            $table->string('organizer', 150);
            $table->text('description');
            $table->string('registration_url', 255)->nullable();
            $table->string('location', 150)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('image', 255)->nullable();
            $table->string('status', 20)->default('active');
            $table->foreignUuid('created_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
