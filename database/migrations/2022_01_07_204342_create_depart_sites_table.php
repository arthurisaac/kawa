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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('noTournee')->nullable();
            $table->time('heureDepart')->nullable();
            $table->string('site')->nullable();
            $table->date('depart_site')->nullable();
            $table->integer('kmDepart')->nullable();
            $table->string('destination')->nullable();
            $table->string('observation')->nullable();
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
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
