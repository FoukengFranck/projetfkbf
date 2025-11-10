<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->constrained('candidats')->cascadeOnDelete();
            $table->foreignId('offre_id')->constrained('offres')->cascadeOnDelete();
            $table->text('lettre_motivation')->nullable();
            $table->string('cv_path')->nullable(); // Pour le cas où le candidat uploade un nouveau CV
            $table->enum('statut', ['nouveau', 'en-cours', 'accepte', 'refuse'])->default('nouveau');
            $table->timestamps();
            // Un candidat ne peut postuler qu'une seule fois à une offre
            $table->unique(['candidat_id', 'offre_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
