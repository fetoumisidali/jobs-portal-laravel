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
        Schema::create('listing_jobs', function (Blueprint $table) {
            
            $table->id();

            // Add Relation Between User And Job
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');
            $table->string('location');
            $table->text('requirements');
            $table->boolean('remote')->default(false);
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->string('contact_email');
            $table->enum(
                'job_type',
                ['Full Time', 'Part time', 'Contract', 'Internship']
            )
                ->default('Full Time');
            $table->string('category');
            $table->string('description');
            $table->integer('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
