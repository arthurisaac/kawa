<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSsbSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ssb_sites', function (Blueprint $table) {
            $table->foreign(['client'])->references(['id'])->on('commercial_clients')->onDelete('CASCADE');
            $table->foreign(['site'])->references(['id'])->on('commercial_sites')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ssb_sites', function (Blueprint $table) {
            $table->dropForeign('ssb_sites_client_foreign');
            $table->dropForeign('ssb_sites_site_foreign');
        });
    }
}
