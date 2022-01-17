<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationFacturationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_facturation_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('facturation')->index('regulation_facturation_items_facturation_foreign');
            $table->string('libelle')->nullable();
            $table->string('qte')->nullable();
            $table->double('pu', 8, 2)->default(0);
            $table->string('reference')->nullable();
            $table->string('debut')->nullable();
            $table->string('fin')->nullable();
            $table->string('montant', 225)->default('0.00');
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
        Schema::dropIfExists('regulation_facturation_items');
    }
}
