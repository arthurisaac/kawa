<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('fournisseur')->index('logistique_produits_fournisseur_foreign');
            $table->string('reference')->nullable();
            $table->string('libelle')->nullable();
            $table->string('description')->nullable();
            $table->integer('seuil')->nullable()->default(0);
            $table->integer('stockAlert')->nullable()->default(0);
            $table->string('ves')->nullable();
            $table->double('prix')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_produits');
    }
}
