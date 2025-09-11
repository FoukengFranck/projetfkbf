<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entreprise_id')->constrained()->onDelete('cascade'); // l’entreprise qui crée l’offre
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('contract_type');
            $table->string('duration')->nullable(); // seulement pour stage
            $table->date('start_date')->nullable();
            $table->string('salary')->nullable();
            $table->string('education_level')->nullable();
            $table->text('description');
            $table->json('missions')->nullable();
            $table->json('skills')->nullable();
            $table->string('status')->default('pending'); // ou "draft", "published" selon ton choix
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
