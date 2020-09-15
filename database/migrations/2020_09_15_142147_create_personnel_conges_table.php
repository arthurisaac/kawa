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
            $table->date('dateDernierDepartConge');
            $table->date('dateProchainDepartConge');
            $table->integer('nombreJourPris');
            $table->integer('nombreJourRestant');
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
