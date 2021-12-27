<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCaisseServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caisse_services', function (Blueprint $table) {
            $table->foreign(['chargeCaisse'])->references(['id'])->on('personnels');
            $table->foreign(['chargeCaisseAdjoint'])->references(['id'])->on('personnels');
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
        Schema::table('caisse_services', function (Blueprint $table) {
            $table->dropForeign('caisse_services_chargecaisse_foreign');
            $table->dropForeign('caisse_services_chargecaisseadjoint_foreign');
        });
    }
}
