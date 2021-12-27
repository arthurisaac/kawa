<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueOperation extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'date',
        'materielDefectueux',
        'rapportMateriel',
        'dateDebut',
        'dateFin',
        'operationEffectuee',
        'localisation_id',

    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
