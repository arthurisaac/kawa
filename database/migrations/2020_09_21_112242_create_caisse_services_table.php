<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->foreignId('chargeCaisse')->references('id')->on('personnels');
            $table->time('chargeCaisseHPS')->nullable();
            $table->time('chargeCaisseHFS')->nullable();
            $table->foreignId('chargeCaisseAdjoint')->references('id')->on('personnels');
            $table->time('chargeCaisseAdjointHPS')->nullable();
            $table->time('chargeCaisseAdjointHFS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_services');
    }
}
