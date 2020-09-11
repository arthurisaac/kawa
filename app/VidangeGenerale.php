<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VidangeGenerale extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'centre',
        'centreRegional',
        'kmActuel',
        'prochainKm',
        'huileMoteur',
        'huileMoteurMarque',
        'huileMoteurKm',
        'huileMoteurFournisseur',
        'huileMoteurmontant',
        'filtreHuile',
        'filtreHuileMontant',
        'filtreGazoil',
        'filtreGazoilMontant',
        'filtreAir',
        'filtreAirMontant',
        'autresConsommables',
        'autresConsommablesMontant'
    ];
}
