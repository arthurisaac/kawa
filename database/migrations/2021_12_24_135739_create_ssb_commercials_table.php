<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsbCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssb_commercials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nomClient')->nullable();
            $table->string('situationGeographique')->nullable();
            $table->string('telephoneClient')->nullable();
            $table->string('regimeImpot')->nullable();
            $table->string('boitePostale')->nullable();
            $table->string('ville')->nullable();
            $table->string('rc')->nullable();
            $table->string('ncc')->nullable();
            $table->string('nomContact')->nullable();
            $table->string('emailContact')->nullable();
            $table->string('portefeuilleClient')->nullable();
            $table->string('fonction')->nullable();
            $table->string('telephoneContact')->nullable();
            $table->string('secteurActivite')->nullable();
            $table->integer('numeroContrat')->nullable();
            $table->date('dateEffet')->nullable();
            $table->integer('dureeContrat')->nullable();
            $table->string('objetArretePhysique')->nullable();
            $table->string('objetArreteComptable')->nullable();
            $table->string('objetApprovisionnement')->nullable();
            $table->string('objetNiveau1')->nullable();
            $table->string('objetNiveau2')->nullable();
            $table->string('objetNiveau3')->nullable();
            $table->string('objetAccompagnement')->nullable();
            $table->string('baseArretePhysique')->nullable();
            $table->string('baseArreteComptable')->nullable();
            $table->string('baseApprovisionnement')->nullable();
            $table->string('baseNiveau1')->nullable();
            $table->string('baseNiveau2')->nullable();
            $table->string('baseNiveau3')->nullable();
            $table->string('baseAccompagnement')->nullable();
            $table->string('coutUnitaire')->nullable();
            $table->string('coutForfaitaire')->nullable();
            $table->double('montant')->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssb_commercials');
    }
}
