<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteDepartTournee extends Model
{
    protected $fillable = [
        'site', 'type', 'tdf', 'idTourneeDepart', 'caisse', 'montant', 'autre',
        'nature', 'client', 'nbre_colis', 'numero_scelle', 'montant_regulation', 'colis', 'valeur_colis', 'numero', 'valeur_autre',
        'valeur_colis_xof', 'device_etrangere_dollar', 'device_etrangere_euro'
    ];

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id')->with("clients");
    }

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'idTourneeDepart', 'id');
    }
}
