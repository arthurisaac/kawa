<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCaisseServiceOperatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caisse_service_operatrices', function (Blueprint $table) {
            $table->foreign(['caisseService'])->references(['id'])->on('caisse_services')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['operatriceCaisse'])->references(['id'])->on('personnels')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caisse_service_operatrices', function (Blueprint $table) {
            $table->dropForeign('caisse_service_operatrices_caisseservice_foreign');
            $table->dropForeign('caisse_service_operatrices_operatricecaisse_foreign');
        });
    }
}
