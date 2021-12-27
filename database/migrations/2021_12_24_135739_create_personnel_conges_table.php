<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_conges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('personnel')->index('personnel_conges_personnel_foreign');
            $table->date('dateDernierDepartConge')->nullable();
            $table->date('dateProchainDepartConge')->nullable();
            $table->integer('nombreJourPris')->nullable();
            $table->integer('nombreJourRestant')->nullable();
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
        Schema::dropIfExists('personnel_conges');
    }
}
