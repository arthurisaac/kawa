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
            $table->integer('idVehicule');
            $table->string('centre');
            $table->string('centreRegional');
            $table->integer('kmActuel');
            $table->integer('prochainKm');
            $table->integer('huileMoteur');
            $table->string('huileMoteurMarque');
            $table->integer('huileMoteurKm');
            $table->string('huileMoteurFournisseur');
            $table->integer('huileMoteurmontant');
            $table->integer('filtreHuile');
            $table->integer('filtreHuileMontant');
            $table->integer('filtreGazoil');
            $table->integer('filtreGazoilMontant');
            $table->integer('filtreAir');
            $table->integer('filtreAirMontant');
            $table->integer('autresConsommables');
            $table->integer('autresConsommablesMontant');
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
