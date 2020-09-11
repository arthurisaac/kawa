<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('client_nom');
            $table->string('client_situation_geographique');
            $table->string('client_tel');
            $table->string('client_regime_impot');
            $table->string('client_boite_postale');
            $table->string('client_ville');
            $table->string('client_rc');
            $table->string('client_ncc');
            $table->string('contact_nom');
            $table->string('contact_email');
            $table->string('contact_portefeuille');
            $table->string('contact_fonction');
            $table->string('contact_portable');
            $table->string('contact_secteur_activite');
            $table->string('contrat_numero');
            $table->date('contrat_date_effet');
            $table->integer('contrat_duree');
            $table->string('contrat_objet');
            $table->string('contrat_desserte');
            $table->string('contrat_frequence_op');
            $table->string('contrat_regime');
            $table->string('base_tdf_vb');
            $table->string('base_tdf_vl');
            $table->string('base_mad_caisse');
            $table->string('base_collecte');
            $table->string('base_petit_materiel_securipack');
            $table->string('base_petit_materiel_sacjute');
            $table->string('base_petit_materiel_scelle');
            $table->string('base_garde_de_fonds_cout_unitaire');
            $table->string('base_garde_de_fonds_montant_garde_cu');
            $table->string('base_garde_de_fonds_cout_forfetaire');
            $table->string('base_garde_de_fonds_montant_garde_cf');
            $table->string('base_comptage_tri_cout_unitaire');
            $table->string('base_comptage_tri_montant_ctv');
            $table->string('base_gestion_atm');
            $table->string('base_maintenance_atm');
            $table->string('base_consommable_atm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercial_clients');
    }
}
