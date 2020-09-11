<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuriteServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securite_services', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date');
            $table->string('centre');
            $table->string('centreRegional');
            $table->string('nomChargeDeSecurite');
            $table->string('prenomChargeDeSecurite');
            $table->string('fonctionChargeDeSecurite');
            $table->string('matriculeChargeDeSecurite');
            $table->string('heureDePriseServiceCs');
            $table->string('csHeureDeFinDeService');
            $table->string('eop11Nom');
            $table->string('eop11Prenom');
            $table->string('eop11Fonction');
            $table->string('eop11Matricule');
            $table->string('eop11HeurePriseServ');
            $table->string('eop11HeureFinService');
            $table->string('eop112Nom');
            $table->string('eop12Prenom');
            $table->string('eop12Fonction');
            $table->string('eop12Matricule');
            $table->string('eop12HeurePriseServ');
            $table->string('eop12HeureFinService');
            $table->string('eop21Nom');
            $table->string('eop21Prenom');
            $table->string('eop21Fonction');
            $table->string('eop21Matricule');
            $table->string('eop21HeurePriseServ');
            $table->string('eop21HeureFinService');
            $table->string('eop22Nom');
            $table->string('eop22Prenom');
            $table->string('eop22Fonction');
            $table->string('eop22Matricule');
            $table->string('eop22HeurePriseServ');
            $table->string('eop22HeureFinService');
            $table->string('eop31Nom');
            $table->string('eop31Prenom');
            $table->string('eop31Fonction');
            $table->string('eop31Matricule');
            $table->string('eop31HeurePriseServ');
            $table->string('eop31HeureFinService');
            $table->string('eop32Nom');
            $table->string('eop32Prenom');
            $table->string('eop32Fonction');
            $table->string('eop32Matricule');
            $table->string('eop32HeurePriseServ');
            $table->string('eop32HeureFinService');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('securite_services');
    }
}
