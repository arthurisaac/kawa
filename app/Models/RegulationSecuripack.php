<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationSecuripack extends Model
{
    protected $table = 'regulation_securipacks';

    protected $fillable = [
        'date',
        'typeSecuripack',
        'numeroDebut',
        'numeroFin',
        'site',
        'client',
        'prixUnitaire',
        'quantite',
        'prixTotal',
        'localisation_id',

    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

}
