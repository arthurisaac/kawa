<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConteneursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteneurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('conteneur');
            $table->string('typeConteneur');
            $table->date('dateMiseVie');
            $table->integer('dureeVie');
            $table->string('etat');
            $table->date('dateDegradation');
            $table->string('cause');
            $table->string('remplacePar');
            $table->date('remplaceLe');
            $table->date('dateMaintenanceEffectuee');
            $table->date('dateImputation');
            $table->date('dateRenouvellement');
            $table->string('imputationRaport');
            $table->string('centre');
            $table->string('centreRegional');
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteneurs');
    }
}
