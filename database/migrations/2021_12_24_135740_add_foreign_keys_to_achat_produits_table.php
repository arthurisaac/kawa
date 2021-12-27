<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAchatProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achat_produits', function (Blueprint $table) {
            $table->foreign(['produit'])->references(['id'])->on('logistique_produits')->onDelete('CASCADE');
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achat_produits', function (Blueprint $table) {
            $table->dropForeign('achat_produits_produit_foreign');
        });
    }
}
