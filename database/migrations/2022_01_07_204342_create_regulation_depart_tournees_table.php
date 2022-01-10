<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationDepartTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_depart_tournees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->time('heure');
            $table->unsignedBigInteger('noTournee')->index('regulation_depart_tournees_notournee_foreign');
            $table->double('totalMontant')->default(0);
            $table->double('totalColis')->default(0);
            $table->integer('kmArrivee')->nullable();
            $table->time('heureArrivee')->nullable();
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_depart_tournees');
    }
}
