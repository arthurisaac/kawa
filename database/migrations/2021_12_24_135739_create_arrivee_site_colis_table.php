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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('arrivee_site')->index('arrivee_site_colis_arrivee_site_foreign');
            $table->string('colis')->nullable();
            $table->string('num_colis')->nullable();
            $table->string('bordereau')->nullable();
            $table->double('montant', 8, 2)->nullable();
            $table->string('nature')->nullable();
            $table->integer('nombre_colis')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('arrivee_site_colis');
    }
}
