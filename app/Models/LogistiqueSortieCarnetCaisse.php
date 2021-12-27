<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieCarnetCaisse extends Model
{

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'service',
        'prixUnitaire',
        'localisation_id',

    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
