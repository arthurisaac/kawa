<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueCarburantComptant extends Model
{
    protected $table = 'logistique_carburant_comptant';

    protected $fillable = [
        'vehicule',
        'date',
        'montant',
        'quantiteServie',
        'lieu',
        'utilisation',
        'localisation_id',

    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
