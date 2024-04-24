<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_voiture');
            $table->foreign('id_client')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_voiture')->references('id')->on('voitures')->onUpdate('cascade')->onDelete('cascade');
            $table->date('dateD');
            $table->date('dateF');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};