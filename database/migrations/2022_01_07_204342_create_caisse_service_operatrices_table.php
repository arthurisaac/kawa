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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('caisseService')->nullable()->index('caisse_service_operatrices_caisseservice_foreign');
            $table->unsignedBigInteger('operatriceCaisse')->nullable()->index('caisse_service_operatrices_operatricecaisse_foreign');
            $table->integer('numeroOperatriceCaisse')->nullable();
            $table->integer('operatriceCaisseBox')->nullable();
            $table->time('heureArrivee')->nullable();
            $table->time('heureDepart')->nullable();
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
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
