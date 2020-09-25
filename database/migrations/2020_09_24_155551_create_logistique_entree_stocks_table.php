<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueEntreeStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_entree_stocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('produit')->references('id')->on('logistique_produits');
            $table->date('dateApprovisionnement')->nullable();
            $table->foreignId('fournisseur')->references('id')->on('logistique_fournisseurs');
            $table->integer('quantite')->nullable();
            $table->double('prixAchat')->default(0);
            $table->text('observation')->nullable();
            $table->string('facture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_entree_stocks');
    }
}
