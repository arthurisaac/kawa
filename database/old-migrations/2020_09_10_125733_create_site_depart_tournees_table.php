<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteDepartTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_depart_tournees', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('site');
            $table->time('heure')->nullable();
            $table->string('tdf')->nullable();
            $table->string('caisse')->nullable();
            $table->float('montant')->nullable();
            $table->foreignId('idTourneeDepart')->references('id')->on('depart_tournees');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_depart_tournees');
    }
}
