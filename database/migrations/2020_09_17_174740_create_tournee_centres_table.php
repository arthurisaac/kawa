<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourneeCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournee_centres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->foreignId('tournee')->references('id')->on('depart_tournees');
            $table->foreignId('vehicule')->references('id')->on('vehicules');
            $table->foreignId('chefDeBord')->references('id')->on('personnels');
            $table->foreignId('agentDeGarde')->references('id')->on('personnels');
            $table->foreignId('chauffeur')->references('id')->on('personnels');
            $table->string('centre');
            $table->string('centreRegional');
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournee_centres');
    }
}
