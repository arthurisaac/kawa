<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('matricule')->nullable();
            $table->string('centre');
            $table->string('centreRegional');
            $table->string('securite')->nullable();
            $table->string('transport')->nullable();
            $table->string('caisse')->nullable();
            $table->string('regulation')->nullable();
            $table->string('siegeService')->nullable();
            $table->string('siegeDirection')->nullable();
            $table->string('siegeDirectionGenerale')->nullable();
            $table->string('nomPrenoms');
            $table->string('dateNaissance')->nullable();
            $table->string('dateEntreeSociete')->nullable();
            $table->string('dateSortie')->nullable();
            $table->string('typeSortie')->nullable();
            $table->string('fonction')->nullable();
            $table->string('service')->nullable();
            $table->string('natureContrat')->nullable();
            $table->string('numeroCNPS')->nullable();
            $table->string('situationMatrimoniale')->nullable();
            $table->string('nombreEnfants')->nullable();
            $table->string('photo')->nullable();
            $table->string('adresseGeographique')->nullable();
            $table->string('contactPersonnel')->nullable();
            $table->string('nomPere')->nullable();
            $table->string('nomMere')->nullable();
            $table->string('nomConjoint')->nullable();
            $table->string('personneContacter')->nullable();
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
        Schema::dropIfExists('personnels');
    }
}
