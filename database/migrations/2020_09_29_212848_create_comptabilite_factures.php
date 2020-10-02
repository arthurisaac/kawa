<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabiliteFactures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilite_factures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numeroFacture');
            $table->foreignId('client')->references('id')->on('commercial_clients')->onDelete('cascade');
            $table->string('periode')->nullable();
            $table->double('montant')->nullable();
            $table->date('dateDepot')->nullable();
            $table->date('dateEcheance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptabilite_facture');
    }
}
