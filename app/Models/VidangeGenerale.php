<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeGenerale extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
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
