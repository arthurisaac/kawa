<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuriteMaterielRemettantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securite_materiel_remettants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('idMateriel')->references('id')->on('securite_materiels');
            $table->string('remettantPieceVehicule')->nullable();
            $table->string('remettantPieceVehiculeQuantite')->nullable();
            $table->string('remettantPieceVehiculeHeureRetour')->nullable();
            $table->string('remettantPieceVehiculeConvoyeur')->nullable();
            $table->string('remettantCleVehicule')->nullable();
            $table->string('remettantCleVehiculeQuantite')->nullable();
            $table->string('remettantCleVehiculeHeureRetour')->nullable();
            $table->string('remettantCleVehiculeConvoyeur')->nullable();
            $table->string('remettantTelephone')->nullable();
            $table->string('remettantTelephoneQuantite')->nullable();
            $table->string('remettantTelephoneHeureRetour')->nullable();
            $table->string('remettantTelephoneConvoyeur')->nullable();
            $table->string('remettantRadio')->nullable();
            $table->string('remettantRadioQuantite')->nullable();
            $table->string('remettantRadioHeureRetour')->nullable();
            $table->string('remettantRadioConvoyeur')->nullable();
            $table->string('remettantGBP')->nullable();
            $table->string('remettantGBPQuantite')->nullable();
            $table->string('remettantGBPHeureRetour')->nullable();
            $table->string('remettantGBPConvoyeur')->nullable();
            $table->string('remettantPA')->nullable();
            $table->string('remettantPAQuantite')->nullable();
            $table->string('remettantPAHeureRetour')->nullable();
            $table->string('remettantPAConvoyeur')->nullable();
            $table->string('remettantFP')->nullable();
            $table->string('remettantFPQuantite')->nullable();
            $table->string('remettantFPHeureRetour')->nullable();
            $table->string('remettantFPConvoyeur')->nullable();
            $table->string('remettantPM')->nullable();
            $table->string('remettantPMQuantite')->nullable();
            $table->string('remettantPMHeureRetour')->nullable();
            $table->string('remettantPMConvoyeur')->nullable();
            $table->string('remettantMunition')->nullable();
            $table->string('remettantMunitionQuantite')->nullable();
            $table->string('remettantMunitionHeureRetour')->nullable();
            $table->string('remettantMunitionConvoyeur')->nullable();
            $table->string('remettantTAG')->nullable();
            $table->string('remettantTAGQuanite')->nullable();
            $table->string('remettantTAGHeureRetour')->nullable();
            $table->string('remettantTAGConvoyeur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('securite_materiel_remettants');
    }
}
