<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLogistiqueEntreeSecuripackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logistique_entree_securipack', function (Blueprint $table) {
            $table->foreign(['fournisseur'])->references(['id'])->on('logistique_fournisseurs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logistique_entree_securipack', function (Blueprint $table) {
            $table->dropForeign('logistique_entree_securipack_fournisseur_foreign');
        });
    }
}
