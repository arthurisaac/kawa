<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHeureSuppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heure_supps', function (Blueprint $table) {
            $table->foreign(['idPersonnel'])->references(['id'])->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('heure_supps', function (Blueprint $table) {
            $table->dropForeign('heure_supps_idpersonnel_foreign');
        });
    }
}
