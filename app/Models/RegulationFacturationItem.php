<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationFacturationItem extends Model
{
    protected $fillable = [
        'facturation',
        'libelle',
        'qte',
        'pu',
        'reference',
        'debut',
        'fin',
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
