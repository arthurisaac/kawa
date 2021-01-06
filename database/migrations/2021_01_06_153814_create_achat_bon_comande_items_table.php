<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatBonComandeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_bon_comande_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('achat_bon_fk')->references('id')->on('achat_bon_comandes')->onDelete('cascade');
            $table->string('designation')->nullable();
            $table->string('quantite')->nullable();
            $table->string('prix')->nullable();
            $table->string('montant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_bon_comande_items');
    }
}
