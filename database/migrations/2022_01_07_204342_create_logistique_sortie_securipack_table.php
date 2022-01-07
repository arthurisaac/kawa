<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueSortieSecuripackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_sortie_securipack', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('debutSerie')->nullable();
            $table->string('finSerie')->nullable();
            $table->date('date')->nullable();
            $table->string('centre')->nullable();
            $table->integer('prixUnitaire')->nullable();
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
        Schema::dropIfExists('logistique_sortie_securipack');
    }
}
