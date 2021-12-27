<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueMission extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'debut',
        'fin',
        'nombreDeJours',
        'objetMission',
        'interventionEffectuee',
        'rapportMission',
        'localisation_id',

    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
