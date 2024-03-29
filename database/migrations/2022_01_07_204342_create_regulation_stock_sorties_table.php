<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationStockSortiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_stock_sorties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
            $table->date('date')->nullable();
            $table->string('service')->nullable();
            $table->string('receveur')->nullable();
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('regulation_stock_sorties');
    }
}
