<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDepartTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depart_tournees', function (Blueprint $table) {
            $table->foreign(['idVehicule'])->references(['id'])->on('vehicules')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('depart_tournees', function (Blueprint $table) {
            $table->dropForeign('depart_tournees_idvehicule_foreign');
        });
    }
}
