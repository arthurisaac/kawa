<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueEntreeCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_entree_commande', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('debutSerie');
            $table->string('finSerie');
            $table->date('date');
            $table->foreignId('fournisseur')->references('id')->on('logistique_fournisseurs')->onDelete('cascade');
            $table->double('prixUnitaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_entree_commande');
    }
}
