<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueSortieStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_sortie_stocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('produit')->references('id')->on('logistique_produits');
            $table->integer('quantite')->default(0)->nullable();
            $table->date('dateSortie')->nullable();
            $table->string('motif')->nullable();
            $table->date('dateSaisie')->nullable();
            $table->text('observation')->nullable();
            $table->string('service')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_sortie_stocks');
    }
}
