<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueSortieSecuripack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_sortie_securipack', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('debutSerie');
            $table->string('finSerie');
            $table->date('date');
            $table->string('centre');
            $table->integer('prixUnitaire');
            $table->string('reference');
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
