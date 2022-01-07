<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarburantComptantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburant_comptants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('idVehicule')->nullable()->index('carburant_comptants_idvehicule_foreign');
            $table->date('date')->nullable();
            $table->integer('montant')->nullable();
            $table->integer('qteServie')->nullable();
            $table->string('lieu')->nullable();
            $table->string('utilisation')->nullable();
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carburant_comptants');
    }
}
