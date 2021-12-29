<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartSiteColis extends Model
{
    protected $fillable = [
        'totalColis',
        'typeColisSecuripack',
        'typeColisSacjute',
        'nombreColisSecuripack',
        'nombreColisSacjute',
        'numeroScelleSecuripack',
        'numeroScelleSacjute',
        'montantAnnonceSecuripack',
        'montantAnnonceSacjute',
        'departSite',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
