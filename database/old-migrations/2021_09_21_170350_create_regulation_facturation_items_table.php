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
            $table->id();
            $table->foreignId('facturation')->references('id')->on('regulation_facturations')->onDelete('cascade');
            $table->string("libelle")->nullable();
            $table->string("qte")->nullable();
            $table->float("pu")->default(0);
            $table->string("reference")->nullable();
            $table->string("debut")->nullable();
            $table->string("fin")->nullable();
            $table->float("montant")->default(0);
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
