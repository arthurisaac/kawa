<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationStockEntreeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_stock_entree_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_entree')->references('id')->on('regulation_stock_entrees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer("qte_attendu")->default(0);
            $table->integer("qte_livree")->default(0);
            $table->string("debut")->nullable();
            $table->string("fin")->nullable();
            $table->float("reste")->default(0);
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
        Schema::dropIfExists('regulation_stock_entree_items');
    }
}
