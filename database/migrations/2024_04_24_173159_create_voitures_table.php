<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('matricule');
            $table->string('marque');
            $table->string('modele');
            $table->string('puissance');
            $table->integer('prixJ');
            $table->string('carburant');
            $table->string('reservee')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};