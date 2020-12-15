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
            $table->id();
            $table->timestamps();
            $table->integer('numeroTournee');
            $table->date('date');
            $table->foreignId('idVehicule')->references('id')->on('vehicules');
            $table->integer('chauffeur')->nullable();
            $table->integer('agentDeGarde')->nullable();
            $table->integer('chefDeBord')->nullable();
            $table->integer('coutTournee')->nullable();
            $table->integer('kmDepart')->nullable();
            $table->time('heureDepart')->nullable();
            $table->integer('kmArrivee')->nullable();
            $table->time('heureArrivee')->nullable();
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
