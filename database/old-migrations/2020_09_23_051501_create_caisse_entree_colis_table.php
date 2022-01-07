<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseEntreeColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_entree_colis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->time('heure')->nullable();
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
            $table->integer('totalColis')->default(0);
            $table->float('totalMontant')->default(0);
            $table->foreignId('agent')->references('id')->on('personnels');
            $table->foreignId('chef')->references('id')->on('personnels');
            $table->string('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_entree_colis');
    }
}
