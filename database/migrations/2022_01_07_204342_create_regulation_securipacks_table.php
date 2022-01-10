<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationSecuripacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_securipacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->string('typeSecuripack')->nullable();
            $table->integer('numeroDebut')->nullable();
            $table->integer('numeroFin')->nullable();
            $table->unsignedBigInteger('site')->index('regulation_securipacks_site_foreign');
            $table->unsignedBigInteger('client')->index('regulation_securipacks_client_foreign');
            $table->integer('prixUnitaire')->nullable();
            $table->integer('quantite')->nullable();
            $table->integer('prixTotal')->nullable();
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
        Schema::dropIfExists('regulation_securipacks');
    }
}
