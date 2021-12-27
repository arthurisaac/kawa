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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('client')->index('commercial_sites_client_foreign');
            $table->string('site')->nullable();
            $table->string('nom_contact_site')->nullable();
            $table->string('fonction_contact')->nullable();
            $table->string('centre');
            $table->string('centre_regional');
            $table->string('telephone')->nullable();
            $table->string('no_carte')->nullable();
            $table->string('oo_vb_extamuros_bitume')->nullable();
            $table->string('oo_vb_extramuros_piste')->nullable();
            $table->string('oo_vl_extramuros_bitume')->nullable();
            $table->string('oo_vl_extramuros_piste')->nullable();
            $table->string('oo_vb_intramuros')->nullable();
            $table->string('oo_mad')->nullable();
            $table->string('oo_collecte')->nullable();
            $table->string('oo_cctv')->nullable();
            $table->string('oo_collecte_caisse')->nullable();
            $table->string('oo_borne_cheque')->nullable();
            $table->string('oo_borne_operation')->nullable();
            $table->string('oo_gestion_gab_niveau')->nullable();
            $table->string('oo_gestion_gab_prix')->nullable();
            $table->string('oo_maintenance_n2')->nullable();
            $table->string('oo_vente_location')->nullable();
            $table->string('oo_vente_consommables')->nullable();
            $table->string('oo_vente_pieces_detachees')->nullable();
            $table->string('oo_securipack')->nullable();
            $table->string('oo_sac_juste')->nullable();
            $table->string('oo_scelle')->nullable();
            $table->string('oo_total')->nullable();
            $table->string('forfait_mensuel_ctv')->nullable();
            $table->string('forfait_mensuel_gdf')->nullable();
            $table->string('forfait_mensuel_mad')->nullable();
            $table->string('regime')->nullable();
            $table->string('tarif_bitume')->nullable();
            $table->string('tarif_km_piste')->nullable();
            $table->string('tarif_tdf_vb')->nullable();
            $table->string('tarif_tdf_vl')->nullable();
            $table->string('tarif_collecte_caissiere')->nullable();
            $table->string('oo_securipack_extra_grand')->nullable();
            $table->string('oo_securipack_grand')->nullable();
            $table->string('oo_securipack_moyen')->nullable();
            $table->string('oo_securipack_petit')->nullable();
            $table->string('oo_sacjuste_extra_grand')->nullable();
            $table->string('oo_sacjuste_grand')->nullable();
            $table->string('oo_sacjuste_moyen')->nullable();
            $table->string('oo_sacjuste_petit')->nullable();
            $table->string('oo_gestion_gab')->nullable();
            $table->string('oo_vl_intramuros')->nullable();
            $table->string('oo_scelle_extra_grand')->nullable();
            $table->string('oo_scelle_grand')->nullable();
            $table->string('oo_scelle_moyen')->nullable();
            $table->string('oo_scelle_petit')->nullable();
            $table->string('oo_garde_fond')->nullable();
            $table->string('oo_comptage')->nullable();
            $table->string('oo_dispatching')->nullable();
            $table->string('oo_ass_appro')->nullable();
            $table->string('oo_dnf')->nullable();
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
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
