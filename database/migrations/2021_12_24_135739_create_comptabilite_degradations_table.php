<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabiliteDegradationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilite_degradations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('dateDegradation')->nullable();
            $table->unsignedBigInteger('conteneur')->index('comptabilite_degradations_conteneur_foreign');
            $table->string('lieu')->nullable();
            $table->string('details')->nullable();
            $table->string('destinationProvenance')->nullable();
            $table->unsignedBigInteger('site')->index('comptabilite_degradations_site_foreign');
            $table->unsignedBigInteger('client')->index('comptabilite_degradations_client_foreign');
            $table->text('commentaire')->nullable();
            $table->string('conteneurEnleve')->nullable();
            $table->string('conteneurAvecFonds')->nullable();
            $table->integer('montant')->nullable();
            $table->date('dateDeclaration')->nullable();
            $table->string('bordereau')->nullable();
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
        Schema::dropIfExists('comptabilite_degradations');
    }
}
