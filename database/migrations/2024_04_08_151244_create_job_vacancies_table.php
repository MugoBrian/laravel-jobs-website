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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete(null);
            $table->string('title');
            $table->text('description');
            $table->string('company_name')->nullable(); // Nullable since it's optional
            $table->string('location')->nullable(); // Nullable since it's optional
            $table->integer('salary_range')->nullable(); // Nullable since it's optional
            $table->string('employment_type')->nullable(); // Nullable since it's optional
            $table->date('application_deadline')->nullable(); // Nullable since it's optional
            $table->string('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
