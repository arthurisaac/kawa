<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelGestionContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_gestion_contrats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_contrat')->nullable();
            $table->date('debut_contrat')->nullable();
            $table->date('fin_contrat')->nullable();
            $table->integer('nombre_jours')->default(0);
            $table->string('fonction')->nullable();
            $table->string('salaire')->nullable();
            $table->unsignedBigInteger('personnel')->index('personnel_gestion_contrats_personnel_foreign');
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('personnel_gestion_contrats');
    }
}
