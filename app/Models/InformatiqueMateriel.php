<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueMateriel extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'date',
        'reference',
        'libelle',
        'quantite',
        'prixUnitaire',
        'montant',
        'factureJointe',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
