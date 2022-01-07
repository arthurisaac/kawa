<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuriteMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securite_materiels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->string('cbNom')->nullable();
            $table->string('cbPrenom')->nullable();
            $table->string('cbFonction')->nullable();
            $table->string('cbMatricule')->nullable();
            $table->string('ccNom')->nullable();
            $table->string('ccPrenom')->nullable();
            $table->string('ccFonction')->nullable();
            $table->string('ccMatricule')->nullable();
            $table->string('cgNom')->nullable();
            $table->string('cgPrenom')->nullable();
            $table->string('cgFonction')->nullable();
            $table->string('cgMatricule')->nullable();
            $table->string('vehiculeVB')->nullable();
            $table->string('vehiculeVL')->nullable();
            $table->string('noTournee')->nullable();
            $table->string('operateurRadio')->nullable();
            $table->string('operateurRadioNom')->nullable();
            $table->string('operateurRadioPrenom')->nullable();
            $table->string('operateurRadioFonction')->nullable();
            $table->string('operateurRadioMatricule')->nullable();
            $table->string('operateurRadioHeurePrise')->nullable();
            $table->string('operateurRadioHeureFin')->nullable();
            $table->string('centre', 100)->nullable();
            $table->string('centre_regional', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('securite_materiels');
    }
}
