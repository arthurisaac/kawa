<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArriveeTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arrivee_tournees', function (Blueprint $table) {
            $table->foreign(['convoyeur1'])->references(['id'])->on('personnels');
            $table->foreign(['convoyeur2'])->references(['id'])->on('personnels');
            $table->foreign(['convoyeur3'])->references(['id'])->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('arrivee_tournees', function (Blueprint $table) {
            $table->dropForeign('arrivee_tournees_convoyeur1_foreign');
            $table->dropForeign('arrivee_tournees_convoyeur2_foreign');
            $table->dropForeign('arrivee_tournees_convoyeur3_foreign');
        });
    }
}
