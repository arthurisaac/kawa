<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationDepartTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_depart_tournees', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("heure");
            $table->foreignId('noTournee')->references('id')->on('depart_tournees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float("totalMontant")->default(0);
            $table->float("totalColis")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_depart_tournees');
    }
}
