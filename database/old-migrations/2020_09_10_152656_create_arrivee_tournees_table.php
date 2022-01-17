<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriveeTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivee_tournees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('numeroTournee');
            $table->foreignId('convoyeur1')->references('id')->on('personnels');
            $table->foreignId('convoyeur2')->references('id')->on('personnels');
            $table->foreignId('convoyeur3')->references('id')->on('personnels');
            $table->integer('kmDepart')->nullable();
            $table->time('heureDepart')->nullable();
            $table->integer('kmArrivee')->nullable();
            $table->time('heureArrivee')->nullable();
            $table->integer('vidangeGenerale')->nullable();
            $table->integer('visiteTechnique')->nullable();
            $table->integer('vidangeCourroie')->nullable();
            $table->integer('patente')->nullable();
            $table->integer('assuranceFin')->nullable();
            $table->integer('assuranceHeurePont')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrivee_tournees');
    }
}
