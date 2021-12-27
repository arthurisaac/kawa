<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformatiqueMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informatique_materiels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('service')->nullable();
            $table->date('date')->nullable();
            $table->string('reference')->nullable();
            $table->string('libelle')->nullable();
            $table->integer('quantite')->default(0);
            $table->double('prixUnitaire')->nullable();
            $table->double('montant')->default(0);
            $table->string('factureJointe')->nullable();
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
        Schema::dropIfExists('informatique_materiels');
    }
}
