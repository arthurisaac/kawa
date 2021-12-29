<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->unsignedBigInteger('chargeeRegulation')->nullable()->index('regulation_services_chargeeregulation_foreign');
            $table->time('chargeeRegulationHPS')->nullable();
            $table->time('chargeeRegulationHFS')->nullable();
            $table->unsignedBigInteger('chargeeRegulationAdjointe')->nullable()->index('regulation_services_chargeeregulationadjointe_foreign');
            $table->time('chargeeRegulationAdjointeHPS')->nullable();
            $table->time('chargeeRegulationAdjointeHFS')->nullable();
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
        Schema::dropIfExists('regulation_services');
    }
}
