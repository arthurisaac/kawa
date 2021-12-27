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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('idMateriel')->index('securite_materiel_beneficiaires_idmateriel_foreign');
            $table->string('beneficiairePieceVehicule')->nullable();
            $table->string('beneficiairePieceVehiculeQuantite')->nullable();
            $table->time('beneficiairePieceVehiculeHeureRetour')->nullable();
            $table->string('beneficiairePieceVehiculeConvoyeur')->nullable();
            $table->string('beneficiaireCleVehicule')->nullable();
            $table->string('beneficiaireCleVehiculeQuantite')->nullable();
            $table->time('beneficiaireCleVehiculeHeureRetour')->nullable();
            $table->string('beneficiaireCleVehiculeConvoyeur')->nullable();
            $table->string('beneficiaireTelephone')->nullable();
            $table->time('beneficiaireTelephoneHeureRetour')->nullable();
            $table->string('beneficiaireTelephoneConvoyeur')->nullable();
            $table->string('beneficiaireRadio')->nullable();
            $table->string('beneficiaireRadioQuantite')->nullable();
            $table->time('beneficiaireRadioHeureRetour')->nullable();
            $table->string('beneficiaireRadioConvoyeur')->nullable();
            $table->string('beneficiaireGBP')->nullable();
            $table->string('beneficiaireGBPQuantite')->nullable();
            $table->time('beneficiaireGBPHeureRetour')->nullable();
            $table->string('beneficiaireGBPConvoyeur')->nullable();
            $table->string('beneficiairePA')->nullable();
            $table->string('beneficiairePAQuantite')->nullable();
            $table->time('beneficiairePAHeureRetour')->nullable();
            $table->string('beneficiairePAConvoyeur')->nullable();
            $table->string('beneficiaireFP')->nullable();
            $table->string('beneficiaireFPQuantite')->nullable();
            $table->time('beneficiaireFPHeureRetour')->nullable();
            $table->string('beneficiaireFPConvoyeur')->nullable();
            $table->string('beneficiairePM')->nullable();
            $table->string('beneficiairePMQuantite')->nullable();
            $table->time('beneficiairePMHeureRetour')->nullable();
            $table->string('beneficiairePMConvoyeur')->nullable();
            $table->string('beneficiaireMunition')->nullable();
            $table->string('beneficiaireMunitionQuantite')->nullable();
            $table->time('beneficiaireMunitionHeureRetour')->nullable();
            $table->string('beneficiaireMunitionConvoyeur')->nullable();
            $table->string('beneficiaireTAG')->nullable();
            $table->string('beneficiaireTAGQuanite')->nullable();
            $table->time('beneficiaireTAGHeureRetour')->nullable();
            $table->string('beneficiaireTAGConvoyeur')->nullable();
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
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
