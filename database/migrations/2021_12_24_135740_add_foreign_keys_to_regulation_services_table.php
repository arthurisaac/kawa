<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegulationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regulation_services', function (Blueprint $table) {
            $table->foreign(['chargeeRegulation'])->references(['id'])->on('personnels')->onDelete('CASCADE');
            $table->foreign(['chargeeRegulationAdjointe'])->references(['id'])->on('personnels')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regulation_services', function (Blueprint $table) {
            $table->dropForeign('regulation_services_chargeeregulation_foreign');
            $table->dropForeign('regulation_services_chargeeregulationadjointe_foreign');
        });
    }
}
