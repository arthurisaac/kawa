<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueEntreeStock extends Model
{
    protected $fillable = [
        'produit',
        'dateApprovisionnement',
        'fournisseur',
        'quantite',
        'prixAchat',
        'observation',
        'facture',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
