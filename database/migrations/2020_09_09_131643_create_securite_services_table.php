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
            $table->string('nomChargeDeSecurite')->nullable();
            $table->string('prenomChargeDeSecurite')->nullable();
            $table->string('fonctionChargeDeSecurite')->nullable();
            $table->string('matriculeChargeDeSecurite')->nullable();
            $table->string('heureDePriseServiceCs')->nullable();
            $table->string('csHeureDeFinDeService')->nullable();
            $table->string('eop11Nom')->nullable();
            $table->string('eop11Prenom')->nullable();
            $table->string('eop11Fonction')->nullable();
            $table->string('eop11Matricule')->nullable();
            $table->string('eop11HeurePriseServ')->nullable();
            $table->string('eop11HeureFinService')->nullable();
            $table->string('eop112Nom')->nullable();
            $table->string('eop12Prenom')->nullable();
            $table->string('eop12Fonction')->nullable();
            $table->string('eop12Matricule')->nullable();
            $table->string('eop12HeurePriseServ')->nullable();
            $table->string('eop12HeureFinService')->nullable();
            $table->string('eop21Nom')->nullable();
            $table->string('eop21Prenom')->nullable();
            $table->string('eop21Fonction')->nullable();
            $table->string('eop21Matricule')->nullable();
            $table->string('eop21HeurePriseServ')->nullable();
            $table->string('eop21HeureFinService')->nullable();
            $table->string('eop22Nom')->nullable();
            $table->string('eop22Prenom')->nullable();
            $table->string('eop22Fonction')->nullable();
            $table->string('eop22Matricule')->nullable();
            $table->string('eop22HeurePriseServ')->nullable();
            $table->string('eop22HeureFinService')->nullable();
            $table->string('eop31Nom')->nullable();
            $table->string('eop31Prenom')->nullable();
            $table->string('eop31Fonction')->nullable();
            $table->string('eop31Matricule')->nullable();
            $table->string('eop31HeurePriseServ')->nullable();
            $table->string('eop31HeureFinService')->nullable();
            $table->string('eop32Nom')->nullable();
            $table->string('eop32Prenom')->nullable();
            $table->string('eop32Fonction')->nullable();
            $table->string('eop32Matricule')->nullable();
            $table->string('eop32HeurePriseServ')->nullable();
            $table->string('eop32HeureFinService')->nullable();
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
