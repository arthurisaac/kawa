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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->time('heure')->nullable();
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
            $table->integer('totalColis')->nullable()->default(0);
            $table->double('totalMontant', 8, 2)->nullable()->default(0);
            $table->string('observation')->nullable();
            $table->integer('noTournee')->nullable();
            $table->string('remettant')->nullable();
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
        Schema::dropIfExists('caisse_entree_colis');
    }
}
