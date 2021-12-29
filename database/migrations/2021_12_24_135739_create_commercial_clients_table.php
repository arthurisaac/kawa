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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('client_nom');
            $table->string('client_situation_geographique')->nullable();
            $table->string('client_tel')->nullable();
            $table->string('client_regime_impot')->nullable();
            $table->string('client_boite_postale')->nullable();
            $table->string('client_ville')->nullable();
            $table->string('client_rc')->nullable();
            $table->string('client_ncc')->nullable();
            $table->string('contact_nom')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_portefeuille')->nullable();
            $table->string('contact_fonction')->nullable();
            $table->string('contact_portable')->nullable();
            $table->string('contact_secteur_activite')->nullable();
            $table->string('contrat_numero')->nullable();
            $table->date('contrat_date_effet')->nullable();
            $table->integer('contrat_duree')->nullable();
            $table->string('contrat_objet')->nullable();
            $table->string('contrat_desserte')->nullable();
            $table->string('contrat_frequence_op')->nullable();
            $table->string('contrat_regime')->nullable();
            $table->string('base_tdf_vb')->nullable();
            $table->string('base_tdf_vl')->nullable();
            $table->string('base_mad_caisse')->nullable();
            $table->string('base_collecte')->nullable();
            $table->string('base_petit_materiel_securipack')->nullable();
            $table->string('base_petit_materiel_sacjute')->nullable();
            $table->string('base_petit_materiel_scelle')->nullable();
            $table->string('base_garde_de_fonds_cout_unitaire')->nullable();
            $table->string('base_garde_de_fonds_montant_garde_cu')->nullable();
            $table->string('base_garde_de_fonds_cout_forfetaire')->nullable();
            $table->string('base_garde_de_fonds_montant_garde_cf')->nullable();
            $table->string('base_comptage_tri_cout_unitaire')->nullable();
            $table->string('base_comptage_tri_montant_ctv')->nullable();
            $table->string('base_gestion_atm')->nullable();
            $table->string('base_maintenance_atm')->nullable();
            $table->string('base_consommable_atm')->nullable();
            $table->string('base_garde_de_fonds_montant_forfaitaire')->nullable();
            $table->string('base_comptage_montant_forfaitaire')->nullable();
            $table->string('bt_atm')->nullable();
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
        Schema::dropIfExists('commercial_clients');
    }
}
