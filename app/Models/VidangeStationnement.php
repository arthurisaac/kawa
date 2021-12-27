<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeStationnement extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'centre',
        'centreRegional',
        'dateRenouvellement',
        'prochainRenouvellement',
        'montant',
        'localisation_id',
        ];

        public static function booted()
        {
            static::creating(function ($modele){
                $modele->localisation_id = Auth::user()->localisation_id;
            });
        }
}
