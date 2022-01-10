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
            $table->bigIncrements('id');
            $table->date('date_affectation')->nullable();
            $table->string('centre')->nullable();
            $table->text('motif')->nullable();
            $table->unsignedBigInteger('personnel')->index('personnel_gestion_affectations_personnel_foreign');
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
        Schema::dropIfExists('personnel_gestion_affectations');
    }
}
