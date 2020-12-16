<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriveeSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivee_sites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('noTournee');
            $table->string('site');
            $table->string('noBordereau')->nullable();
            $table->string('heureArrivee')->nullable();
            $table->string('kmArrivee')->nullable();
            $table->string('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrivee_centres');
    }
}
