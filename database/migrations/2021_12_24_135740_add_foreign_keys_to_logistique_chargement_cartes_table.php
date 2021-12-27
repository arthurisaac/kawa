<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLogistiqueChargementCartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logistique_chargement_cartes', function (Blueprint $table) {
            $table->foreign(['carte'])->references(['id'])->on('carburant_cartes')->onDelete('CASCADE');
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
        Schema::table('logistique_chargement_cartes', function (Blueprint $table) {
            $table->dropForeign('logistique_chargement_cartes_carte_foreign');
        });
    }
}
