<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCaisseVideoSurveillancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caisse_video_surveillances', function (Blueprint $table) {
            $table->foreign(['operatrice'])->references(['id'])->on('caisse_service_operatrices')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('caisse_video_surveillances', function (Blueprint $table) {
            $table->dropForeign('caisse_video_surveillances_operatrice_foreign');
        });
    }
}
