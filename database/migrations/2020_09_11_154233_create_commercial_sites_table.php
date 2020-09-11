<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_sites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('client');
            $table->string('site');
            $table->string('nom_contact_site');
            $table->string('fonction_contact');
            $table->string('centre');
            $table->string('centre_regional');
            $table->string('telephone');
            $table->string('no_carte');
            $table->string('objet_operation');
            $table->string('forfait_mensuel_ctv');
            $table->string('forfait_mensuel_gdf');
            $table->string('forfait_mensuel_mad');
            $table->string('regime');
            $table->string('tarif_bitume');
            $table->string('tarif_km_piste');
            $table->string('tarif_tdf_vb');
            $table->string('tarif_tdf_vl');
            $table->string('tarif_collecte_caissiere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercial_sites');
    }
}
