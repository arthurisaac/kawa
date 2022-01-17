<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseSortieColisItem extends Model
{
    protected $fillable = [
        "sortieColis",
        "site",
        "autre",
        "nature",
        "scelle",
        "nbre_colis",
        "montant",
        'colis', 'valeur_colis_xof_sortie', 'device_etrangere_dollar_sortie', 'device_etrangere_euro_sortie', 'pierre_precieuse_sortie',
        'localisation_id',
    ];

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id')
            ->with("clients");
    }
}
