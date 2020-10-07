<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commercial_client extends Model
{
    protected $fillable = [
        'client_nom',
        'client_situation_geographique',
        'client_tel',
        'client_regime_impot',
        'client_boite_postale',
        'client_ville',
        'client_rc',
        'client_ncc',
        'contact_nom',
        'contact_email',
        'contact_portefeuille',
        'contact_fonction',
        'contact_portable',
        'contact_secteur_activite',
        'contrat_numero',
        'contrat_date_effet',
        'contrat_duree',
        'contrat_objet',
        'contrat_desserte',
        'contrat_frequence_op',
        'contrat_regime',
        'base_tdf_vb',
        'base_tdf_vl',
        'base_mad_caisse',
        'base_collecte',
        'base_petit_materiel_securipack',
        'base_petit_materiel_sacjute',
        'base_petit_materiel_scelle',
        'base_garde_de_fonds_cout_unitaire',
        'base_garde_de_fonds_montant_garde_cu',
        'base_garde_de_fonds_cout_forfetaire',
        'base_garde_de_fonds_montant_garde_cf',
        'base_comptage_tri_cout_unitaire',
        'base_comptage_tri_montant_ctv',
        'base_gestion_atm',
        'base_maintenance_atm',
        'base_consommable_atm',
        ];
}
