<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelGestionAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_gestion_absences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('debut_absence')->nullable();
            $table->date('fin_absence')->nullable();
            $table->integer('nombre_jours')->default(0);
            $table->text('motif')->nullable();
            $table->string('frais')->nullable();
            $table->unsignedBigInteger('personnel')->index('personnel_gestion_absences_personnel_foreign');
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
        Schema::dropIfExists('personnel_gestion_absences');
    }
}
