<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueSortieTicketVisite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_sortie_ticket_visite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('debutSerie')->nullable();
            $table->string('finSerie')->nullable();
            $table->date('date')->nullable();
            $table->string('centre')->nullable();
            $table->integer('prixUnitaire')->nullable();
            $table->string('reference')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_sortie_ticket_visite');
    }
}
