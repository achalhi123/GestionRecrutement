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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Candidat
            $table->foreignId('offre_id')->constrained('offres')->onDelete('cascade'); // Offre
            $table->foreignId('cv_id')->constrained('cvs')->onDelete('cascade'); // CV
            $table->foreignId('lettre_motivation_id')->constrained('lettre_motivations')->onDelete('cascade'); // Lettre de motivation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
