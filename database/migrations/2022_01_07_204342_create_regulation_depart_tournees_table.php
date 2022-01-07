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
            $table->date('date');
            $table->time('heure');
            $table->unsignedBigInteger('noTournee')->index('regulation_depart_tournees_notournee_foreign');
            $table->double('totalMontant')->default(0);
            $table->double('totalColis')->default(0);
            $table->timestamps();
            $table->integer('kmArrivee')->nullable();
            $table->time('heureArrivee')->nullable();
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
