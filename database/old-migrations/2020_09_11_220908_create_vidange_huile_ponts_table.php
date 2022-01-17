<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidangeHuilePontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidange_huile_ponts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->integer('idVehicule');
            $table->string('centre');
            $table->string('centreRegional');
            $table->integer('kmActuel');
            $table->integer('prochainKm');
            /*$table->integer('huilePont');
            $table->string('huilePontMarque');
            $table->integer('huilePontKm');
            $table->string('huilePontFournisseur');
            $table->integer('huilePontmontant');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vidange_huile_ponts');
    }
}
