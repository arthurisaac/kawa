<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseVideoSurveillancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_video_surveillances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->time('heureDebut')->nullable();
            $table->time('heureFin')->nullable();
            $table->integer('numeroBox')->nullable();
            $table->foreignId('operatrice')->references('id')->on('caisse_service_operatrices');
            $table->string('securipack')->nullable();
            $table->string('sacjute')->nullable();
            $table->string('numeroScelle')->nullable();
            $table->string('ecart')->nullable();
            $table->string('erreur')->nullable();
            $table->string('absence')->nullable();
            $table->string('commentaire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_video_surveillances');
    }
}
