<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCarburantComptantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carburant_comptants', function (Blueprint $table) {
            $table->foreign(['idVehicule'])->references(['id'])->on('vehicules');
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
        Schema::table('carburant_comptants', function (Blueprint $table) {
            $table->dropForeign('carburant_comptants_idvehicule_foreign');
        });
    }
}
