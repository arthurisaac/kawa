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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('numeroTournee');
            $table->unsignedBigInteger('convoyeur1')->index('arrivee_tournees_convoyeur1_foreign');
            $table->unsignedBigInteger('convoyeur2')->index('arrivee_tournees_convoyeur2_foreign');
            $table->unsignedBigInteger('convoyeur3')->index('arrivee_tournees_convoyeur3_foreign');
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
