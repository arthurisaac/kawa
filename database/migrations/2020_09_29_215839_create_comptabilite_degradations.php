<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabiliteDegradations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilite_degradations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('dateDegradation')->nullable();
            $table->foreignId('conteneur')->references('id')->on('conteneurs')->onDelete('cascade');
            $table->string('lieu')->nullable();
            $table->string('details')->nullable();
            $table->string('destinationProvenance')->nullable();
            $table->foreignId('site')->references('id')->on('commercial_sites')->onDelete('cascade');
            $table->foreignId('client')->references('id')->on('commercial_clients')->onDelete('cascade');
            $table->text('commentaire')->nullable();
            $table->string('conteneurEnleve')->nullable();
            $table->string('conteneurAvecFonds')->nullable();
            $table->integer('montant')->nullable();
            $table->date('dateDeclaration')->nullable();
            $table->string('bordereau')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptabilite_degradation');
    }
}
