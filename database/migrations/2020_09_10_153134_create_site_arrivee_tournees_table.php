<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteArriveeTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_arrivee_tournees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('site');
            $table->string('bord');
            $table->integer('montant');
            $table->foreignId('idTourneeArrivee')->references('id')->on('arrivee_tournees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_depart_arrivee_tournees');
    }
}
