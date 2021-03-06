<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidangeGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidange_generales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->foreignId('idVehicule')->references('id')->on('vehicules');
            $table->string('centre');
            $table->string('centreRegional');
            $table->integer('kmActuel')->nullable();
            $table->integer('prochainKm')->nullable();
            $table->integer('huileMoteur')->nullable();
            $table->string('huileMoteurMarque')->nullable();
            $table->integer('huileMoteurKm')->nullable();
            $table->string('huileMoteurFournisseur')->nullable();
            $table->integer('huileMoteurmontant')->nullable();
            $table->integer('filtreHuile')->nullable();
            $table->integer('filtreHuileMontant')->nullable();
            $table->integer('filtreGazoil')->nullable();
            $table->integer('filtreGazoilMontant')->nullable();
            $table->integer('filtreAir')->nullable();
            $table->integer('filtreAirMontant')->nullable();
            $table->integer('autresConsommables')->nullable();
            $table->integer('autresConsommablesMontant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vidange_generales');
    }
}
