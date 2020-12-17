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
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('cbMatricule')->nullable();
            $table->string('ccMatricule')->nullable();
            $table->string('cgMatricule')->nullable();
            $table->string('vehiculeVB')->nullable();
            $table->string('vehiculeVL')->nullable();
            $table->string('noTournee')->nullable();
            $table->string('operateurRadio')->nullable();
            $table->string('operateurRadioMatricule')->nullable();
            $table->string('operateurRadioHeurePrise')->nullable();
            $table->string('operateurRadioHeureFin')->nullable();
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
