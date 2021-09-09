<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourneeCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournee_centres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('noTournee')->references('id')->on('depart_tournees')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('centre');
            $table->string('centreRegional');
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournee_centres');
    }
}
