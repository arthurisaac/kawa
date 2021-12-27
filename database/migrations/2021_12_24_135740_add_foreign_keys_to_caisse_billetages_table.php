<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCaisseBilletagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caisse_billetages', function (Blueprint $table) {
            $table->foreign(['ctv'])->references(['id'])->on('caisse_ctvs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caisse_billetages', function (Blueprint $table) {
            $table->dropForeign('caisse_billetages_ctv_foreign');
        });
    }
}
