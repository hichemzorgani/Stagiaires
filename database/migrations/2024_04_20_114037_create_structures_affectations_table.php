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
        Schema::create('structures_affectations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['Direction', 'Sous-direction', 'Departement']);
            $table->integer('quota_pfe')->unsigned();
            $table->integer('quota_im')->unsigned();
            $table->integer('year')->unsigned()->default(date('Y'));;
            $table->unsignedBigInteger('structuresIAP_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('structuresIAP_id')->references('id')->on('structures_i_a_p_s')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('structures_affectations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structures_affectations');
    }
};
