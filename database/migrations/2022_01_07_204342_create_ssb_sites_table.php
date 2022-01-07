<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsbSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssb_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('libelle')->nullable();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('etrags')->nullable();
            $table->string('banque')->nullable();
            $table->string('filiale')->nullable();
            $table->unsignedBigInteger('client')->index('ssb_sites_client_foreign');
            $table->unsignedBigInteger('site')->index('ssb_sites_site_foreign');
            $table->string('nomContact')->nullable();
            $table->string('fonctionContact')->nullable();
            $table->string('tel')->nullable();
            $table->string('nombreGab')->nullable();
            $table->string('muros')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssb_sites');
    }
}
