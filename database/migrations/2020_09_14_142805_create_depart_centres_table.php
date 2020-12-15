<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depart_centres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('noTournee')->references('id')->on('depart_tournees');
            $table->string('heureDepart')->nullable();
            $table->string('kmDepart')->nullable();
            $table->string('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depart_centres');
    }
}
