<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelGestionCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_gestion_conges', function (Blueprint $table) {
            $table->id();
            $table->date('dernier')->nullable();
            $table->date('prochain')->nullable();
            $table->integer('jourPris')->default(0);
            $table->foreignId('personnel')->references('id')->on('personnels');
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
        Schema::dropIfExists('personnel_gestion_conges');
    }
}
