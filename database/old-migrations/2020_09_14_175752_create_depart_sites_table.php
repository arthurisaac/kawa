<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depart_sites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('noTournee')->nullable();
            $table->time('heureDepart')->nullable();
            $table->string('site')->nullable();
            $table->integer('kmDepart')->nullable();
            $table->integer('bordereau');
            $table->string('destination')->nullable();
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
        Schema::dropIfExists('depart_sites');
    }
}
