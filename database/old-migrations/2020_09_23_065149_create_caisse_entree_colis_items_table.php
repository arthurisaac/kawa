<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseEntreeColisItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_entree_colis_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('site')->references('id')->on('commercial_sites')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("autre")->nullable();
            $table->string("nature")->nullable();
            $table->string("scelle")->nullable();
            $table->integer("nbre_colis")->nullable();
            $table->float("montant")->nullable();
            $table->foreignId('entree_colis')->references('id')->on('caisse_entree_colis')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_entree_colis_items');
    }
}
