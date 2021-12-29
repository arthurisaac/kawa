<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ssb extends Model
{
    protected $table = 'ssb';

    protected $fillable = [
        'numeroIncident',
        'numeroBordereau',
        'site',
        'banque',
        'centre',
        'centreRegional',
        'intervention',
        'dabiste1',
        'dabiste2',
        'heureDeclaration',
        'heureReponse',
        'heureArrivee',
        'debutIntervention',
        'finIntervention',
        'dateCloture',
        'localisation_id',

    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

}
