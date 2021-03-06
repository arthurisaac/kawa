<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueEntreeTicketVisite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_entree_ticket_visite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('debutSerie')->nullable();
            $table->string('finSerie')->nullable();
            $table->date('date')->nullable();
            $table->foreignId('fournisseur')->references('id')->on('logistique_fournisseurs')->onDelete('cascade');
            $table->double('prixUnitaire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_entree_ticket_visite');
    }
}
