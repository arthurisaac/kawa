<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieSecuripack extends Model
{
    protected $table = 'logistique_sortie_securipack';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',
        'reference',
        'localisation_id',

    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
