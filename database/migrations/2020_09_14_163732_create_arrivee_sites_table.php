<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriveeSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivee_sites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('numeroSite')->default('1')->nullable();
            $table->string('site');
            $table->date('date');
            $table->foreignId('vehicule')->references('id')->on('vehicules');
            $table->foreignId('chefDeBord')->references('id')->on('personnels');
            $table->foreignId('chauffeur')->references('id')->on('personnels');
            $table->string('heureDepart')->nullable();
            $table->string('kmDepart')->nullable();
            $table->string('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrivee_centres');
    }
}
