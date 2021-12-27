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
            $table->timestamps();
            $table->string('receveur')->nullable();
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
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
