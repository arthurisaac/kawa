<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabiliteReglementFatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilite_reglement_fatures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('facture')->references('id')->on('comptabilite_factures')->onDelete('cascade');
            $table->date('date');
            $table->string('modeReglement')->nullable();
            $table->string('pieceComptable')->nullable();
            $table->double('montantVerse')->nullable();
            $table->double('montantRestant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptabilite_reglement_fature');
    }
}
