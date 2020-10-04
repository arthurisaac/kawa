<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('centre');
            $table->string('centreRegional');
            $table->foreignId('chargeeRegulation')->references('id')->on('personnels')->onDelete('cascade');
            $table->time('chargeeRegulationHPS')->nullable();
            $table->time('chargeeRegulationHFS')->nullable();
            $table->foreignId('chargeeRegulationAdjointe')->references('id')->on('personnels')->onDelete('cascade');
            $table->time('chargeeRegulationAdjointeHPS')->nullable();
            $table->time('chargeeRegulationAdjointeHFS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_service');
    }
}
