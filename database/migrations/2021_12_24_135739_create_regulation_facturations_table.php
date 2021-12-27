<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationFacturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_facturations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('numero')->nullable();
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
            $table->string('type')->nullable();
            $table->string('montantTotal')->default('0.00');
            $table->unsignedBigInteger('client')->index('regulation_facturations_client_foreign');
            $table->timestamps();
            $table->unsignedBigInteger('site_id')->index('regulation_facturation_site_foreign');
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
        Schema::dropIfExists('regulation_facturations');
    }
}
