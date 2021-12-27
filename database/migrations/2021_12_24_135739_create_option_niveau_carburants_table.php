<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionNiveauCarburantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_niveau_carburants', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('option')->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_niveau_carburants');
    }
}
