<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSsb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssb', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numeroIncident')->nullable();
            $table->string('numeroBordereau')->nullable();
            $table->foreignId('site')->references('id')->on('commercial_sites')->onDelete('cascade');
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
