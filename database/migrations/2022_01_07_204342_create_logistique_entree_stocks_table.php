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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('produit')->index('logistique_entree_stocks_produit_foreign');
            $table->date('dateApprovisionnement')->nullable();
            $table->unsignedBigInteger('fournisseur')->index('logistique_entree_stocks_fournisseur_foreign');
            $table->integer('quantite')->nullable();
            $table->double('prixAchat')->default(0);
            $table->text('observation')->nullable();
            $table->string('facture')->nullable();
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
        Schema::dropIfExists('logistique_entree_stocks');
    }
}
