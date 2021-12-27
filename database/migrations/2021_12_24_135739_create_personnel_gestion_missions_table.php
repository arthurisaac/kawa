<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelGestionMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_gestion_missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('debut_mission')->nullable();
            $table->date('fin_mission')->nullable();
            $table->integer('nombre_jours')->default(0);
            $table->string('lieu')->nullable();
            $table->text('motif')->nullable();
            $table->double('frais')->nullable();
            $table->unsignedBigInteger('personnel')->index('personnel_gestion_missions_personnel_foreign');
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_gestion_missions');
    }
}
