<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarburantCartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburant_cartes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('numeroCarte');
            $table->string('societe');
            $table->integer('idVehicule');
            $table->date('dateAquisition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carburant_cartes');
    }
}
