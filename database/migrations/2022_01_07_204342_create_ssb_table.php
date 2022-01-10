<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssb', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('numeroIncident')->nullable();
            $table->string('numeroBordereau')->nullable();
            $table->unsignedBigInteger('site')->index('ssb_site_foreign');
            $table->string('banque')->nullable();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('intervention')->nullable();
            $table->string('dabiste1')->nullable();
            $table->string('dabiste2')->nullable();
            $table->time('heureDeclaration')->nullable();
            $table->time('heureReponse')->nullable();
            $table->time('heureArrivee')->nullable();
            $table->time('debutIntervention')->nullable();
            $table->time('finIntervention')->nullable();
            $table->date('dateCloture')->nullable();
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
        Schema::dropIfExists('ssb');
    }
}
