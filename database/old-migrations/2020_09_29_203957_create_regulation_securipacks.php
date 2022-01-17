<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationSecuripacks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_securipacks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('typeSecuripack')->nullable();
            $table->integer('numeroDebut')->nullable();
            $table->integer('numeroFin')->nullable();
            $table->foreignId('site')->references('id')->on('commercial_sites')->onDelete('cascade');
            $table->foreignId('client')->references('id')->on('commercial_clients')->onDelete('cascade');
            $table->integer('prixUnitaire')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('prixTotal')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_securuipacks');
    }
}
