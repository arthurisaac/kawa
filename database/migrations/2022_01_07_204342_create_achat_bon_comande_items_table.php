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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('achat_bon_fk')->index('achat_bon_comande_items_achat_bon_fk_foreign');
            $table->string('designation')->nullable();
            $table->string('quantite')->nullable();
            $table->string('prix')->nullable();
            $table->string('montant')->nullable();
            $table->integer('tva')->nullable();
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
