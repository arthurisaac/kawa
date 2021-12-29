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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('site');
            $table->string('bord');
            $table->integer('montant');
            $table->unsignedBigInteger('idTourneeArrivee')->index('site_arrivee_tournees_idtourneearrivee_foreign');
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
        Schema::dropIfExists('site_arrivee_tournees');
    }
}
