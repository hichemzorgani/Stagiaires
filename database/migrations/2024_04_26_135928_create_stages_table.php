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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->enum('stage_type', ['immersion', 'pfe']);
            $table->string('theme');
            $table->string('domain');
            $table->string('speciality');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('level', ['Licence', 'Master', 'Doctorat', 'Ingenieur']);
            $table->enum('stagiare_count', ['Monome', 'Binome', 'Trinome']);
            $table->unsignedInteger('year')->default(date('Y'));
            $table->enum('reception_day', ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']);
            $table->unsignedBigInteger('encadrant_id');
            $table->foreign('encadrant_id')->references('id')->on('encadrants')->onDelete('cascade');
            $table->unsignedBigInteger('etablissement_id');
            $table->foreign('etablissement_id')->references('id')->on('etablissements')->onDelete('cascade');
            $table->unsignedBigInteger('structuresAffectation_id');
            $table->foreign('structuresAffectation_id')->references('id')->on('structures_affectations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
