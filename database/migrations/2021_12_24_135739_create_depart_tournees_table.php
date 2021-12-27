<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depart_tournees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('numeroTournee')->nullable()->default('');
            $table->date('date');
            $table->unsignedBigInteger('idVehicule')->index('depart_tournees_idvehicule_foreign');
            $table->integer('chauffeur')->nullable();
            $table->integer('agentDeGarde')->nullable();
            $table->integer('chefDeBord')->nullable();
            $table->integer('coutTournee')->nullable();
            $table->integer('kmDepart')->nullable();
            $table->time('heureDepart')->nullable();
            $table->integer('kmArrivee')->nullable();
            $table->time('heureArrivee')->nullable();
            $table->string('centre')->nullable();
            $table->string('centre_regional', 225)->nullable();
            $table->time('heure_arrivee_regulation')->nullable();
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
        Schema::dropIfExists('depart_tournees');
    }
}
