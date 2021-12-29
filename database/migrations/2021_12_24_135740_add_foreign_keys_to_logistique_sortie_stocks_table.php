<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLogistiqueSortieStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logistique_sortie_stocks', function (Blueprint $table) {
            $table->foreign(['produit'])->references(['id'])->on('logistique_produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logistique_sortie_stocks', function (Blueprint $table) {
            $table->dropForeign('logistique_sortie_stocks_produit_foreign');
        });
    }
}
