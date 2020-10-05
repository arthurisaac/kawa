<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatProduits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_produits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date')->nullable();
            $table->foreignId('produit')->references('id')->on('logistique_produits')->onDelete('cascade');
            $table->string('affectationService')->nullable();
            $table->string('affectationDirection')->nullable();
            $table->string('affectationDirectionGenerale')->nullable();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('montant')->nullable();
            $table->double('montantTTC')->nullable();
            $table->double('montantHT')->nullable();
            $table->string('suiviBudgetaire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_produit');
    }
}
