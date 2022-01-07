<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSiteDepartTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_depart_tournees', function (Blueprint $table) {
            $table->foreign(['idTourneeDepart'])->references(['id'])->on('depart_tournees')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_depart_tournees', function (Blueprint $table) {
            $table->dropForeign('site_depart_tournees_idtourneedepart_foreign');
        });
    }
}
