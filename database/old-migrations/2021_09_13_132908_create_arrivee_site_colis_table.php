<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArriveeSiteColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivee_site_colis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('arrivee_site')->references('id')->on('arrivee_sites')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('site')->references('id')->on('commercial_sites')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('colis')->nullable();
            $table->integer('num_colis')->default(0);
            $table->string('bordereau')->nullable();
            $table->float('montant')->nullable();
            $table->string('nature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrivee_site_colis');
    }
}
