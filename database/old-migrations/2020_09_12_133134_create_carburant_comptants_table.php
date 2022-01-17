<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarburantComptantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburant_comptants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('idVehicule')->references('id')->on('vehicules');
            $table->date('date');
            $table->integer('montant');
            $table->integer('qteServie');
            $table->string('lieu');
            $table->string('utilisation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carburant_comptants');
    }
}
