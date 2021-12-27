<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArriveeTournee extends Model
{
    protected $fillable = [
        'numeroTournee',
        'convoyeur1',
        'convoyeur2',
        'convoyeur3',
        'kmArrivee',
        'heureArrivee',
        'kmDepart',
        'heureDepart',
        'vidangeGenerale',
        'visiteTechnique',
        'vidangeCourroie',
        'patente',
        'assuranceFin',
        'assuranceHeurePont',
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
