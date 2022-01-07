<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationStockEntreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_stock_entrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero');
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
            $table->date('date')->nullable();
            $table->string('libelle')->nullable();
            $table->string('fournisseur')->nullable();
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
        Schema::dropIfExists('regulation_stock_entrees');
    }
}
