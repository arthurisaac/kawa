<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarburantTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburant_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->time('heure')->nullable();
            $table->string('lieu')->nullable();
            $table->integer('numeroTicket')->nullable();
            $table->integer('numeroCarteCarburant')->nullable();
            $table->integer('idVehicule')->nullable();
            $table->integer('solde')->nullable();
            $table->integer('soldePrecedent')->nullable();
            $table->string('utilisation')->nullable();
            $table->integer('kilometrage')->nullable();
            $table->string('litrage')->nullable();
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carburant_tickets');
    }
}
