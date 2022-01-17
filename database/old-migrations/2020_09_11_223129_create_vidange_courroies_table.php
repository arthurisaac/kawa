<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidangeCourroiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidange_courroies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->integer('idVehicule');
            $table->string('centre');
            $table->string('centreRegional');
            $table->integer('kmActuel');
            $table->integer('prochainKm');
            $table->integer('courroie');
            $table->string('courroieMarque');
            $table->integer('courroieKm');
            $table->string('courroieFournisseur');
            $table->integer('courroieMontant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vidange_courroies');
    }
}
