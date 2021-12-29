<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieCommande extends Model
{
    protected $table = 'logistique_sortie_commande';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',
        'reference',
        'localisation_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'debutSerie',
        'finSerie',
        'date',

    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

}
