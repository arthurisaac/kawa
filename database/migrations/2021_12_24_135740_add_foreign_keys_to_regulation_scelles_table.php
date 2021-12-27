<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegulationScellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regulation_scelles', function (Blueprint $table) {
            $table->foreign(['client'])->references(['id'])->on('commercial_clients')->onDelete('CASCADE');
            $table->foreign(['site'])->references(['id'])->on('commercial_sites')->onDelete('CASCADE');
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
        Schema::table('regulation_scelles', function (Blueprint $table) {
            $table->dropForeign('regulation_scelles_client_foreign');
            $table->dropForeign('regulation_scelles_site_foreign');
        });
    }
}
