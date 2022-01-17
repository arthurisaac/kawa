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
            $table->id();
            $table->date('debut_mission')->nullable();
            $table->date('fin_mission')->nullable();
            $table->integer('nombre_jours')->default(0);
            $table->string('lieu')->nullable();
            $table->text('motif')->nullable();
            $table->double('frais')->nullable();
            $table->foreignId('personnel')->references('id')->on('personnels');
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
        Schema::dropIfExists('personnel_gestion_conges');
    }
}
