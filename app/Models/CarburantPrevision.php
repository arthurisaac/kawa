<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarburantPrevision extends Model
{
    protected $fillable = [
        'dateDu',
        'dateAu',
        'axe',
        'typeVehicule',
        'distance',
        'conso100',
        'litrage',
        'coutCarburant',
        'dessSemaine',
        'coutSemaine',
        'dessMois',
        'coutMois',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
