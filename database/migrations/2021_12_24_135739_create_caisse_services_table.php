<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->unsignedBigInteger('chargeCaisse')->nullable()->index('caisse_services_chargecaisse_foreign');
            $table->time('chargeCaisseHPS')->nullable();
            $table->time('chargeCaisseHFS')->nullable();
            $table->unsignedBigInteger('chargeCaisseAdjoint')->nullable()->index('caisse_services_chargecaisseadjoint_foreign');
            $table->time('chargeCaisseAdjointHPS')->nullable();
            $table->time('chargeCaisseAdjointHFS')->nullable();
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
        Schema::dropIfExists('caisse_services');
    }
}
