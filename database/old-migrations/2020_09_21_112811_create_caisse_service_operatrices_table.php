<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseServiceOperatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_service_operatrices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('caisseService')->references('id')->on('caisse_services');
            $table->foreignId('operatriceCaisse')->references('id')->on('personnels');
            $table->integer('numeroOperatriceCaisse');
            $table->integer('operatriceCaisseBox');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_service_operatrices');
    }
}
