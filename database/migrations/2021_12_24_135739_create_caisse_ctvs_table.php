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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->unsignedBigInteger('operatriceCaisse')->nullable()->index('caisse_ctvs_operatricecaisse_foreign');
            $table->integer('numeroBox')->nullable();
            $table->time('heurePriseBox')->nullable();
            $table->time('heureFinBox')->nullable();
            $table->unsignedBigInteger('tournee')->index('caisse_ctvs_tournee_foreign');
            $table->string('bordereau')->nullable();
            $table->unsignedBigInteger('convoyeurGarde')->nullable()->index('caisse_ctvs_convoyeurgarde_foreign');
            $table->unsignedBigInteger('regulatrice')->nullable()->index('caisse_ctvs_regulatrice_foreign');
            $table->string('securipack')->nullable();
            $table->string('sacjute')->nullable();
            $table->integer('nombreColis')->nullable();
            $table->integer('numeroScelleColis')->nullable();
            $table->integer('montantAnnonce')->nullable();
            $table->unsignedBigInteger('client')->nullable()->index('caisse_ctvs_client_foreign');
            $table->unsignedBigInteger('site')->nullable()->index('caisse_ctvs_site_foreign');
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
            $table->string('centre', 100)->nullable();
            $table->string('centre_regional', 100)->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
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
