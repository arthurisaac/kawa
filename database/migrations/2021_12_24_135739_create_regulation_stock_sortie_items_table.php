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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stock_sortie')->index('regulation_stock_sortie_items_stock_sortie_foreign');
            $table->date('date')->nullable();
            $table->double('qte_prevu', 8, 2)->nullable();
            $table->double('qte_sortie', 8, 2)->nullable();
            $table->string('debut')->nullable();
            $table->string('fin')->nullable();
            $table->string('reference')->nullable();
            $table->string('autre')->nullable();
            $table->string('libelle', 100)->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
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
