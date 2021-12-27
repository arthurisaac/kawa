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
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
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
