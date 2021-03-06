<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformatiqueMissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informatique_missions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('service')->nullable();
            $table->integer('nombreDeJours')->nullable();
            $table->date('debut')->nullable();
            $table->date('fin')->nullable();
            $table->string('objetMission')->nullable();
            $table->text('interventionEffectuee')->nullable();
            $table->text('rapportMission')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informatique_missions');
    }
}
