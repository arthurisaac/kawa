<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationFacturations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_facturations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string("numero")->nullable();
            $table->string("centre")->nullable();
            $table->string("centre_regional")->nullable();
            $table->string("type")->nullable();
            $table->float("montantTotal")->default(0);
            $table->foreignId('client')->references('id')->on('commercial_clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_facturation');
    }
}
