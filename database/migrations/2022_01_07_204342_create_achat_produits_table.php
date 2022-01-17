<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('produit')->index('achat_produits_produit_foreign');
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
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_produits');
    }
}
