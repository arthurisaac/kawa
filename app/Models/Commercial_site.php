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
        'objet_operation',
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
