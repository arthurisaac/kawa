<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvoyeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convoyeurs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('matricule');
            $table->string('nomPrenoms');
            $table->date('dateNaissance')->nullable();
            $table->string('fonction');
            $table->date('dateEmbauche')->nullable();
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convoyeurs');
    }
}
