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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->time('heureDebut')->nullable();
            $table->time('heureFin')->nullable();
            $table->integer('numeroBox')->nullable();
            $table->unsignedBigInteger('operatrice')->index('caisse_video_surveillances_operatrice_foreign');
            $table->string('securipack')->nullable();
            $table->string('sacjute')->nullable();
            $table->string('numeroScelle')->nullable();
            $table->string('ecart')->nullable();
            $table->string('erreur')->nullable();
            $table->string('absence')->nullable();
            $table->string('commentaire')->nullable();
            $table->string('centre', 100)->nullable();
            $table->string('centre_regional', 100)->nullable();
            $table->string('numero_bord', 100)->nullable();
            $table->text('remarque')->nullable();
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
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
