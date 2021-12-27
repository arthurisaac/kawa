<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonnelGestionSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnel_gestion_sanctions', function (Blueprint $table) {
            $table->foreign(['personnel'])->references(['id'])->on('personnels');
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
        Schema::table('personnel_gestion_sanctions', function (Blueprint $table) {
            $table->dropForeign('personnel_gestion_sanctions_personnel_foreign');
        });
    }
}
