<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVidangeGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vidange_generales', function (Blueprint $table) {
            $table->foreign(['idVehicule'])->references(['id'])->on('vehicules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vidange_generales', function (Blueprint $table) {
            $table->dropForeign('vidange_generales_idvehicule_foreign');
        });
    }
}
