<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToComptabiliteReglementFaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comptabilite_reglement_fatures', function (Blueprint $table) {
            $table->foreign(['facture'])->references(['id'])->on('comptabilite_factures')->onDelete('CASCADE');
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
        Schema::table('comptabilite_reglement_fatures', function (Blueprint $table) {
            $table->dropForeign('comptabilite_reglement_fatures_facture_foreign');
        });
    }
}
