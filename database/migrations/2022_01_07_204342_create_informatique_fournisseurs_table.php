<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformatiqueFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informatique_fournisseurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('libelleFournisseur')->nullable();
            $table->string('specialite')->nullable();
            $table->string('localisation')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informatique_fournisseurs');
    }
}
