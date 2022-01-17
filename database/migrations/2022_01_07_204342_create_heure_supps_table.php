<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeureSuppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heure_supps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->string('typeDate')->nullable();
            $table->unsignedBigInteger('idPersonnel')->index('heure_supps_idpersonnel_foreign');
            $table->time('heureArrivee')->nullable();
            $table->time('heureArrivee1')->nullable();
            $table->time('heureArrivee2')->nullable();
            $table->time('heureArrivee3')->nullable();
            $table->time('heureDepart')->nullable();
            $table->time('heureDepart1')->nullable();
            $table->time('heureDepart2')->nullable();
            $table->time('heureDepart3')->nullable();
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
        Schema::dropIfExists('heure_supps');
    }
}
