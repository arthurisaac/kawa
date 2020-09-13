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
            $table->foreignId('client')->references('id')->on('commercial_clients');
            $table->string('site')->nullable();
            $table->string('nom_contact_site')->nullable();
            $table->string('fonction_contact')->nullable();
            $table->string('centre');
            $table->string('centre_regional');
            $table->string('telephone')->nullable();
            $table->string('no_carte')->nullable();
            $table->string('objet_operation')->nullable();
            $table->string('forfait_mensuel_ctv')->nullable();
            $table->string('forfait_mensuel_gdf')->nullable();
            $table->string('forfait_mensuel_mad')->nullable();
            $table->string('regime')->nullable();
            $table->string('tarif_bitume')->nullable();
            $table->string('tarif_km_piste')->nullable();
            $table->string('tarif_tdf_vb')->nullable();
            $table->string('tarif_tdf_vl')->nullable();
            $table->string('tarif_collecte_caissiere')->nullable();
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
