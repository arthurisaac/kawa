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
        'autresConsommablesMontant',
        'localisation_id',
    ];

    public function vehicules()
    {
        return $this->belongsTo('App\Models\Vehicule', 'idVehicule', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
