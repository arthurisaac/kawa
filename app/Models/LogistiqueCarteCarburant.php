<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueCarteCarburant extends Model
{
    protected $table = 'logistique_carte_carburant';

    protected $fillable = [
        'numeroCarte',
        'societe',
        'numeroVehicule',
        'dateAquisition',
        'localisation_id',

    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }


}
