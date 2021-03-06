<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarburantPrevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburant_previsions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('dateDu');
            $table->date('dateAu');
            $table->string('axe');
            $table->string('typeVehicule');
            $table->integer('distance');
            $table->string('conso100');
            $table->integer('litrage');
            $table->integer('coutCarburant');
            $table->integer('dessSemaine');
            $table->integer('coutSemaine');
            $table->integer('dessMois');
            $table->integer('coutMois');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carburant_previsions');
    }
}
