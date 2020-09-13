<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('immatriculation');
            $table->string('marque')->nullable();
            $table->string('type')->nullable();
            $table->string('code')->nullable();
            $table->string('num_chassis')->nullable();
            $table->string('DPMC')->nullable();
            $table->string('dateAcquisition')->nullable();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('photo')->nullable();
            $table->string('chauffeurTitulaireNom')->nullable();
            $table->string('chauffeurTitulairePrenom')->nullable();
            $table->string('chauffeurTitulaireDateAffection')->nullable();
            $table->string('chauffeurTitulaireFonction')->nullable();
            $table->string('chauffeurTitulaireMatricule')->nullable();
            $table->string('chauffeurSuppleantNom')->nullable();
            $table->string('chauffeurSuppleantPrenom')->nullable();
            $table->string('chauffeurSuppleantFonction')->nullable();
            $table->string('chauffeurSuppleantMatricule')->nullable();
            $table->string('chauffeurSuppleantDateAffection')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
