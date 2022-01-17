<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueChargementCartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_chargement_cartes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('carte')->references('id')->on('carburant_cartes')->onDelete('cascade');;
            $table->string('date')->nullable();
            $table->double('somme')->nullable();
            $table->string('service')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_chargement_cartes');
    }
}
