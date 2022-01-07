<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidangeTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidange_transports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->integer('idVehicule');
            $table->date('dateRenouvellement');
            $table->date('prochainRenouvellement');
            $table->integer('montant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vidange_transports');
    }
}
