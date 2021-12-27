<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegulationBordereauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regulation_bordereau', function (Blueprint $table) {
            $table->foreign(['responsable'])->references(['id'])->on('personnels')->onDelete('CASCADE');
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
        Schema::table('regulation_bordereau', function (Blueprint $table) {
            $table->dropForeign('regulation_bordereau_responsable_foreign');
        });
    }
}
