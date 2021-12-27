<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLogistiqueProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logistique_produits', function (Blueprint $table) {
            $table->foreign(['fournisseur'])->references(['id'])->on('logistique_fournisseurs');
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
        Schema::table('logistique_produits', function (Blueprint $table) {
            $table->dropForeign('logistique_produits_fournisseur_foreign');
        });
    }
}
