<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('immatriculation');
            $table->string('marque')->nullable();
            $table->string('type')->nullable();
            $table->string('code')->nullable();
            $table->string('num_chassis')->nullable();
            $table->string('DPMC')->nullable();
            $table->string('dateAcquisition')->nullable();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('photo')->nullable();
            $table->string('chauffeurTitulaire')->nullable();
            $table->string('chauffeurSuppleant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
