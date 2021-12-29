<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComptabiliteFacture extends Model
{

    protected $fillable = [
        'numeroFacture',
        'client',
        'periode',
        'montant',
        'dateDepot',
        'dateEcheance',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
