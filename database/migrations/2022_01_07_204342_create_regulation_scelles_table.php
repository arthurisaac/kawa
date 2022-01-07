<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationScellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_scelles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->integer('numeroDebut')->nullable();
            $table->integer('numeroFin')->nullable();
            $table->unsignedBigInteger('site')->index('regulation_scelles_site_foreign');
            $table->unsignedBigInteger('client')->index('regulation_scelles_client_foreign');
            $table->integer('prixUnitaire')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('prixTotal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_scelles');
    }
}
