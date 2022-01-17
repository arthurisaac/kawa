<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriveeCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivee_centres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('noTournee')->index('arrivee_centres_notournee_foreign');
            $table->time('heureArrivee');
            $table->string('kmArrive');
            $table->string('niveauCarburant', 55)->nullable();
            $table->string('finTournee')->nullable();
            $table->date('dateArrivee')->nullable();
            $table->string('observation')->nullable()->default('RAS');
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
        Schema::dropIfExists('arrivee_centres');
    }
}
