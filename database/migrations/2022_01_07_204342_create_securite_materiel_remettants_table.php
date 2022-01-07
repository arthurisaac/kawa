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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('idMateriel')->index('securite_materiel_remettants_idmateriel_foreign');
            $table->string('remettantPieceVehicule')->nullable();
            $table->string('remettantPieceVehiculeQuantite')->nullable();
            $table->time('remettantPieceVehiculeRemise')->nullable();
            $table->string('remettantPieceVehiculeConvoyeur')->nullable();
            $table->time('remettantPieceVehiculeRetour')->nullable();
            $table->string('remettantCleVehicule')->nullable();
            $table->string('remettantCleVehiculeQuantite')->nullable();
            $table->time('remettantCleVehiculeRemise')->nullable();
            $table->string('remettantCleVehiculeConvoyeur')->nullable();
            $table->time('remettantCleVehiculeRetour')->nullable();
            $table->string('remettantTelephone')->nullable();
            $table->string('remettantTelephoneQuantite')->nullable();
            $table->time('remettantTelephoneRemise')->nullable();
            $table->string('remettantTelephoneConvoyeur')->nullable();
            $table->time('remettantTelephoneRetour')->nullable();
            $table->string('remettantRadio')->nullable();
            $table->string('remettantRadioQuantite')->nullable();
            $table->time('remettantRadioRemise')->nullable();
            $table->string('remettantRadioConvoyeur')->nullable();
            $table->time('remettantRadioRetour')->nullable();
            $table->string('remettantGBP')->nullable();
            $table->string('remettantGBPQuantite')->nullable();
            $table->time('beneficiaireGBPRemise')->nullable();
            $table->string('remettantGBPConvoyeur')->nullable();
            $table->string('remettantGBPRetour')->nullable();
            $table->string('remettantPA')->nullable();
            $table->string('remettantPAQuantite')->nullable();
            $table->time('remettantPARemise')->nullable();
            $table->string('remettantPAConvoyeur')->nullable();
            $table->time('remettantPARetour')->nullable();
            $table->string('remettantFP')->nullable();
            $table->string('remettantFPQuantite')->nullable();
            $table->time('beneficiaireFPRemise')->nullable();
            $table->string('remettantFPConvoyeur')->nullable();
            $table->time('remettantFPRetour')->nullable();
            $table->string('remettantPM')->nullable();
            $table->string('remettantPMQuantite')->nullable();
            $table->time('remettantPMRemise')->nullable();
            $table->string('remettantPMConvoyeur')->nullable();
            $table->time('remettantPMRetour')->nullable();
            $table->string('remettantMunition')->nullable();
            $table->string('remettantMunitionQuantite')->nullable();
            $table->string('remettantMunitionRemise')->nullable();
            $table->string('remettantMunitionConvoyeur')->nullable();
            $table->time('remettantMunitionRetour')->nullable();
            $table->string('remettantTAG')->nullable();
            $table->string('remettantTAGQuantite')->nullable();
            $table->time('remettantTAGRemise')->nullable();
            $table->string('remettantTAGConvoyeur')->nullable();
            $table->time('remettantTAGRetour')->nullable();
            $table->string('remettantMunitionPA')->nullable();
            $table->string('remettantMunitionPAQuantite')->nullable();
            $table->time('remettantMunitionPARemise')->nullable();
            $table->string('remettantMunitionPAConvoyeur')->nullable();
            $table->time('remettantMunitionPARetour')->nullable();
            $table->string('remettantMunitionFM')->nullable();
            $table->string('remettantMunitionFMQuantite')->nullable();
            $table->string('remettantMunitionFMRemise')->nullable();
            $table->string('remettantMunitionFMConvoyeur')->nullable();
            $table->time('remettantMunitionFMRetour')->nullable();
            $table->string('remettantMunitionFP')->nullable();
            $table->string('remettantMunitionFPQuantite')->nullable();
            $table->string('remettantMunitionFPRemise')->nullable();
            $table->string('remettantMunitionFPConvoyeur')->nullable();
            $table->time('remettantMunitionFPRetour')->nullable();
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
