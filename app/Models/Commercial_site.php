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
        'oo_vb_extamuros_bitume',
        'oo_vb_extramuros_piste',
        'oo_vl_extramuros_bitume',
        'oo_vb_intramuros',
        'oo_vl_intramuros',
        'oo_mad',
        'oo_collecte',
        'oo_cctv',
        'oo_collecte_caisse',
        'oo_borne_cheque',
        'oo_borne_operation',
        'oo_gestion_gab_niveau',
        'oo_gestion_gab_prix',
        'oo_maintenance_n2',
        'oo_vente_location',
        'oo_vente_consommables',
        'oo_vente_pieces_detachees',
        'oo_securipack',
        'oo_sac_juste',
        'oo_scelle',
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
