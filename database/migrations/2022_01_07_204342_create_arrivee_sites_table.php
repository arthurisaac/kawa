<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriveeSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivee_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('noTournee');
            $table->string('site');
            $table->string('operation')->nullable();
            $table->string('observation')->nullable();
            $table->date('dateArrivee')->nullable();
            $table->time('heureArrivee')->nullable();
            $table->time('debutOperation')->nullable();
            $table->time('finOperation')->nullable();
            $table->integer('tempsOperation')->nullable();
            $table->integer('nombre_colis')->nullable();
            $table->text('asObservation')->nullable();
            $table->string('asDestination')->nullable();
            $table->dateTime('asDepartSite')->nullable();
            $table->integer('asKm')->nullable();
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
        Schema::dropIfExists('arrivee_sites');
    }
}
