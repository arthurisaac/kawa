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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('produit')->index('logistique_sortie_stocks_produit_foreign');
            $table->integer('quantite')->nullable()->default(0);
            $table->date('dateSortie')->nullable();
            $table->string('motif')->nullable();
            $table->date('dateSaisie')->nullable();
            $table->text('observation')->nullable();
            $table->string('service')->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
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
