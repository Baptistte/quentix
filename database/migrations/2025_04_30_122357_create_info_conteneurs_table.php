<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Creates the info_conteneurs table.
     */
    public function up(): void
    {
        // It's conventional to use snake_case for table names in Laravel
        Schema::create('info_conteneurs', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing unsigned BIGINT primary key column named 'id'

            // Foreign key for applications table (assuming you have an 'applications' table)
            // Uses unsignedBigInteger to match the standard 'id' type
            // 'constrained' automatically sets up the foreign key constraint
            // If your applications table is named differently, change 'applications'

            // Foreign key for users table

            $table->dateTime('date_deploiement'); // Use dateTime for date and time, or just date() if time isn't needed
            $table->string('nom_conteneur');
            $table->string('chemin_pwd'); // Path (PWD)
            $table->string('nom_compose'); // Composite name

            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     * Drops the info_conteneurs table.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_conteneurs');
    }
};