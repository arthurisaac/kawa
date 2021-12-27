<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteArriveeTournee extends Model
{
    protected $fillable = [
        'site',
        'bord',
        'montant',
        'idTourneeArrivee',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
