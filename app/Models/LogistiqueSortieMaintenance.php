<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieMaintenance extends Model
{
    protected $table = 'logistique_sortie_maintenance';

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
