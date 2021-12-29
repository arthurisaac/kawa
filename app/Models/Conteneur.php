<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conteneur extends Model
{
    protected $fillable = [
        'conteneur',
        'typeConteneur',
        'dateMiseVie',
        'dureeVie',
        'etat',
        'dateDegradation',
        'cause',
        'remplacePar',
        'remplaceLe',
        'dateMaintenanceEffectuee',
        'dateImputation',
        'dateRenouvellement',
        'imputationRaport',
        'centre',
        'centreRegional',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
