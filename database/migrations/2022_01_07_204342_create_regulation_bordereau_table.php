<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationBordereauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_bordereau', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->time('heure')->nullable();
            $table->integer('stockInitial')->nullable();
            $table->integer('numeroDebut')->nullable();
            $table->integer('numeroFin')->nullable();
            $table->integer('quantite')->nullable();
            $table->double('stockTotal')->nullable();
            $table->integer('seuilAlerte1')->nullable();
            $table->integer('seuilAlerte2')->nullable();
            $table->integer('seuilAlerte3')->nullable();
            $table->date('dateAffection')->nullable();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('typeAffectation')->nullable();
            $table->unsignedBigInteger('responsable')->index('regulation_bordereau_responsable_foreign');
            $table->integer('numeroDebutAffection')->nullable();
            $table->integer('numeroFinAffection')->nullable();
            $table->integer('quantiteAffectee')->nullable();
            $table->integer('stockActuel')->nullable();
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
        Schema::dropIfExists('regulation_bordereau');
    }
}
