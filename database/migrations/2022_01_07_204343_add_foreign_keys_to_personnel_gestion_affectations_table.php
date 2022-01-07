<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonnelGestionAffectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnel_gestion_affectations', function (Blueprint $table) {
            $table->foreign(['personnel'])->references(['id'])->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnel_gestion_affectations', function (Blueprint $table) {
            $table->dropForeign('personnel_gestion_affectations_personnel_foreign');
        });
    }
}
