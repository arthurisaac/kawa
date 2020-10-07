<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuriteMaterielBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securite_materiel_beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('idMateriel')->references('id')->on('securite_materiels');
            $table->string('beneficiairePieceVehicule')->nullable();
            $table->string('beneficiairePieceVehiculeQuantite')->nullable();
            $table->string('beneficiairePieceVehiculeHeureRetour')->nullable();
            $table->string('beneficiairePieceVehiculeConvoyeur')->nullable();
            $table->string('beneficiaireCleVehicule')->nullable();
            $table->string('beneficiaireCleVehiculeQuantite')->nullable();
            $table->string('beneficiaireCleVehiculeHeureRetour')->nullable();
            $table->string('beneficiaireCleVehiculeConvoyeur')->nullable();
            $table->string('beneficiaireTelephone')->nullable();
            $table->string('beneficiaireTelephoneHeureRetour')->nullable();
            $table->string('beneficiaireTelephoneConvoyeur')->nullable();
            $table->string('beneficiaireRadio')->nullable();
            $table->string('beneficiaireRadioQuantite')->nullable();
            $table->string('beneficiaireRadioHeureRetour')->nullable();
            $table->string('beneficiaireRadioConvoyeur')->nullable();
            $table->string('beneficiaireGBP')->nullable();
            $table->string('beneficiaireGBPQuantite')->nullable();
            $table->string('beneficiaireGBPHeureRetour')->nullable();
            $table->string('beneficiaireGBPConvoyeur')->nullable();
            $table->string('beneficiairePA')->nullable();
            $table->string('beneficiairePAQuantite')->nullable();
            $table->string('beneficiairePAHeureRetour')->nullable();
            $table->string('beneficiairePAConvoyeur')->nullable();
            $table->string('beneficiaireFP')->nullable();
            $table->string('beneficiaireFPQuantite')->nullable();
            $table->string('beneficiaireFPHeureRetour')->nullable();
            $table->string('beneficiaireFPConvoyeur')->nullable();
            $table->string('beneficiairePM')->nullable();
            $table->string('beneficiairePMQuantite')->nullable();
            $table->string('beneficiairePMHeureRetour')->nullable();
            $table->string('beneficiairePMConvoyeur')->nullable();
            $table->string('beneficiaireMunition')->nullable();
            $table->string('beneficiaireMunitionQuantite')->nullable();
            $table->string('beneficiaireMunitionHeureRetour')->nullable();
            $table->string('beneficiaireMunitionConvoyeur')->nullable();
            $table->string('beneficiaireTAG')->nullable();
            $table->string('beneficiaireTAGQuanite')->nullable();
            $table->string('beneficiaireTAGHeureRetour')->nullable();
            $table->string('beneficiaireTAGConvoyeur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('securite_materiel_beneficiaires');
    }
}
