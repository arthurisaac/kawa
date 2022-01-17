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
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->time('heure');
            $table->string('lieu');
            $table->integer('numeroTicket');
            $table->integer('numeroCarteCarburant');
            $table->integer('idVehicule');
            $table->integer('solde');
            $table->integer('soldePrecedent');
            $table->string('utilisation');
            $table->integer('kilometrage');
            $table->string('litrage');
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
