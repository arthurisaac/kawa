<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSecuriteMaterielRemettantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('securite_materiel_remettants', function (Blueprint $table) {
            $table->foreign(['idMateriel'])->references(['id'])->on('securite_materiels')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('securite_materiel_remettants', function (Blueprint $table) {
            $table->dropForeign('securite_materiel_remettants_idmateriel_foreign');
        });
    }
}
