<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commercial_site extends Model
{
    protected $fillable = [
        'client',
        'site',
        'nom_contact_site',
        'fonction_contact',
        'centre',
        'centre_regional',
        'telephone',
        'no_carte',
        'oo_tdf_vb',
        'oo_tdf_vl',
        'oo_mad_caisse',
        'oo_collecte',
        'oo_collecte_caisse',
        'oo_garde_fond',
        'oo_comptage_tri',
        'oo_gestion_atm',
        'oo_maintenance_atm',
        'oo_consommable_atm',
        'oo_petit_materiel',
        'oo_total',
        'forfait_mensuel_ctv',
        'forfait_mensuel_gdf',
        'forfait_mensuel_mad',
        'regime',
        'tarif_bitume',
        'tarif_km_piste',
        'tarif_tdf_vb',
        'tarif_tdf_vl',
        'tarif_collecte_caissiere',
        ];
}
