<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationStockSortieItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_stock_sortie_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_sortie')->references('id')->on('regulation_stock_sorties')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float("qte_prevu")->nullable();
            $table->float("qte_sortie")->nullable();
            $table->string("debut")->nullable();
            $table->string("fin")->nullable();
            $table->float("reste")->nullable();
            $table->string("autre")->nullable();
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
        Schema::dropIfExists('regulation_stock_sortie_items');
    }
}
