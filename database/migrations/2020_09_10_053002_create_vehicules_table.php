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
            $table->string('marque');
            $table->string('type');
            $table->string('code');
            $table->string('num_chassis');
            $table->string('DPMC');
            $table->string('dateAcquisition');
            $table->string('centre');
            $table->string('centreRegional');
            $table->string('photo');
            $table->string('chauffeurTitulaireNom');
            $table->string('chauffeurTitulairePrenom');
            $table->string('chauffeurTitulaireDateAffection');
            $table->string('chauffeurTitulaireFonction');
            $table->string('chauffeurTitulaireMatricule');
            $table->string('chauffeurSuppleantNom');
            $table->string('chauffeurSuppleantPrenom');
            $table->string('chauffeurSuppleantFonction');
            $table->string('chauffeurSuppleantMatricule');
            $table->string('chauffeurSuppleantDateAffection');
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
