<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarburantCarte extends Model
{
    protected $fillable = [
        'numeroCarte',
        'societe',
        'idVehicule',
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
