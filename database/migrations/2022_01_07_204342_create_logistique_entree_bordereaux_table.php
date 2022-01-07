<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueEntreeBordereauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_entree_bordereaux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('debutSerie')->nullable();
            $table->string('finSerie')->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('fournisseur')->index('logistique_entree_bordereaux_fournisseur_foreign');
            $table->double('prixUnitaire')->nullable();
            $table->string('reference')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_entree_bordereaux');
    }
}
