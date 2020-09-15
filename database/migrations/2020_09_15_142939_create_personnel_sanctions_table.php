<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_sanctions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('personnel')->references('id')->on('personnels');
            $table->string('licenciement');
            $table->string('miseAPied');
            $table->string('avertissement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_sanctions');
    }
}
