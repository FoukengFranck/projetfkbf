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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('nom_entreprise');
            $table->string('identifiant_unique')->unique();
            $table->string('secteur_activite');
            $table->string('adresse');
            $table->string('region');
            $table->string('ville');
            $table->string('quartier')->nullable();

            $table->string('email_professionnel')->unique();
            $table->string('site_web')->nullable();

            $table->string('nom_responsable');
            $table->string('fonction_responsable');
            $table->string('telephone_responsable');
            $table->string('email_responsable');

            $table->string('nombre_employes');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
