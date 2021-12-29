<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDepartSiteColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depart_site_colis', function (Blueprint $table) {
            $table->foreign(['departSite'])->references(['id'])->on('depart_sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('depart_site_colis', function (Blueprint $table) {
            $table->dropForeign('depart_site_colis_departsite_foreign');
        });
    }
}
