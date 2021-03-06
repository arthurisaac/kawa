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
            $table->id();
            $table->timestamps();
            $table->foreignId('personnel')->references('id')->on('personnels');
            $table->date('dateDernierDepartConge')->nullable();
            $table->date('dateProchainDepartConge')->nullable();
            $table->integer('nombreJourPris')->nullable();
            $table->integer('nombreJourRestant')->nullable();
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
