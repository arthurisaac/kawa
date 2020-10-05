<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistiqueSortieBordereaux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistique_sortie_bordereaux', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('debutSerie')->nullable();
            $table->string('finSerie')->nullable();
            $table->date('date')->nullable();
            $table->string('service')->nullable();
            $table->double('prix')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_sortie_bordereaux');
    }
}
