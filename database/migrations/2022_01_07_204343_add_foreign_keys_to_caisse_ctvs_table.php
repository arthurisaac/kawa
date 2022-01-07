<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCaisseCtvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caisse_ctvs', function (Blueprint $table) {
            $table->foreign(['client'])->references(['id'])->on('commercial_clients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['convoyeurGarde'])->references(['id'])->on('personnels')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['regulatrice'])->references(['id'])->on('personnels')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['site'])->references(['id'])->on('commercial_sites')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tournee'])->references(['id'])->on('personnels')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caisse_ctvs', function (Blueprint $table) {
            $table->dropForeign('caisse_ctvs_client_foreign');
            $table->dropForeign('caisse_ctvs_convoyeurgarde_foreign');
            $table->dropForeign('caisse_ctvs_regulatrice_foreign');
            $table->dropForeign('caisse_ctvs_site_foreign');
            $table->dropForeign('caisse_ctvs_tournee_foreign');
        });
    }
}
