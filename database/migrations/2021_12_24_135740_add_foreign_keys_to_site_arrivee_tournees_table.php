<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSiteArriveeTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_arrivee_tournees', function (Blueprint $table) {
            $table->foreign(['idTourneeArrivee'])->references(['id'])->on('arrivee_tournees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_arrivee_tournees', function (Blueprint $table) {
            $table->dropForeign('site_arrivee_tournees_idtourneearrivee_foreign');
        });
    }
}
