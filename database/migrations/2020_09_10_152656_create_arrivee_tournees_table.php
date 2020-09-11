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
            $table->integer('convoyeur1');
            $table->integer('convoyeur2');
            $table->integer('convoyeur3');
            $table->integer('kmArrivee');
            $table->integer('heureArrivee');
            $table->integer('vidangeGenerale');
            $table->integer('visiteTechnique');
            $table->integer('vidangeCourroie');
            $table->integer('patente');
            $table->integer('assuranceFin');
            $table->integer('assuranceHeurePont');
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
