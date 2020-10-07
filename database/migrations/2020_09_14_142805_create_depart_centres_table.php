<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depart_centres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('date');
            $table->foreignId('noTournee')->references('id')->on('depart_tournees');
            $table->foreignId('vehicule')->references('id')->on('vehicules');
            $table->foreignId('chefDeBord')->references('id')->on('personnels');
            $table->foreignId('agentDeGarde')->references('id')->on('personnels');
            $table->foreignId('chauffeur')->references('id')->on('personnels');
            $table->string('heureDepart');
            $table->string('kmDepart');
            $table->string('observation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depart_centres');
    }
}
