<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationDepartTourneeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_depart_tournee_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regulation_depart')->references('id')->on('regulation_depart_tournees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('site')->references('id')->on('commercial_sites')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("client")->nullable();
            $table->string("nature")->nullable();
            $table->integer("nbre_colis")->default(0);
            $table->string("numero_scelle")->nullable();
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
        Schema::dropIfExists('regulation_depart_tournee_items');
    }
}
