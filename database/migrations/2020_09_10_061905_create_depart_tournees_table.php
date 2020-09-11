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
            $table->integer('idVehicule');
            $table->integer('chauffeur');
            $table->integer('agentDeGarde');
            $table->integer('chefDeBord');
            $table->integer('coutTournee');
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
