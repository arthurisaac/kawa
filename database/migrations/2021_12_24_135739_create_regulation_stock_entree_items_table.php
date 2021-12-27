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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stock_entree')->index('regulation_stock_entree_items_stock_entree_foreign');
            $table->integer('qte_attendu')->default(0);
            $table->integer('qte_livree')->default(0);
            $table->string('debut')->nullable();
            $table->string('fin')->nullable();
            $table->double('reste', 8, 2)->default(0);
            $table->string('autre')->nullable();
            $table->timestamps();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('regulation_stock_entree_items');
    }
}
