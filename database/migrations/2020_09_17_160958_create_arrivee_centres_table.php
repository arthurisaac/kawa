<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriveeCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivee_centres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('noTournee')->references('id')->on('depart_tournees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->time('heureArrivee');
            $table->string('kmArrive');
            $table->string('observation')->nullable()->default('RAS');
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
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
