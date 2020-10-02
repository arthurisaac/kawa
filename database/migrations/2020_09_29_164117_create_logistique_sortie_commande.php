<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueSortieCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_sortie_commande', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('debutSerie');
            $table->string('finSerie');
            $table->date('date');
            $table->string('service');
            $table->integer('prixUnitaire');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_sortie_commande');
    }
}
