<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseCtvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_ctvs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->foreignId('operatriceCaisse')->references('id')->on('personnels');
            $table->integer('numeroBox');
            $table->time('heurePriseBox')->nullable();
            $table->time('heureFinBox')->nullable();
            $table->foreignId('tournee')->references('id')->on('personnels');
            $table->foreignId('bordereau')->references('id')->on('bordereaux');
            $table->foreignId('convoyeurGarde')->references('id')->on('personnels');
            $table->foreignId('regulatrice')->references('id')->on('personnels');

            $table->string('securipack')->nullable();
            $table->string('sacjute')->nullable();
            $table->integer('nombreColis')->nullable();
            $table->integer('numeroScelleColis')->nullable();
            $table->integer('montantAnnonce')->nullable();

            $table->foreignId('client')->references('id')->on('commercial_clients');
            $table->foreignId('site')->references('id')->on('sites');
            $table->string('expediteur')->nullable();
            $table->string('destinataire')->nullable();
            $table->integer('montantReconnu')->nullable();
            $table->integer('ecartConstate')->nullable();
            $table->integer('montantFinal')->nullable();
            $table->string('billetsCalcules')->nullable();
            $table->integer('billetsCalculesMontant')->nullable();
            $table->string('billetsSansValeurs')->nullable();
            $table->integer('billetsSansValeursMontant')->nullable();
            $table->string('billetsUsages')->nullable();
            $table->integer('billetsUsagesMontant')->nullable();
            $table->string('fauxBillets')->nullable();
            $table->integer('fauxBilletsMontant')->nullable();
            $table->string('billetsDeparailles')->nullable();
            $table->integer('billetsDeparaillesMontant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_ctvs');
    }
}
