<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelGestionAffectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_gestion_affectations', function (Blueprint $table) {
            $table->id();
            $table->date('date_affectation')->nullable();
            $table->string('centre')->nullable();
            $table->text('motif')->nullable();
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
        Schema::dropIfExists('personnel_gestion_affectations');
    }
}
