<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatProduit extends Model
{
    protected $table = 'achat_produits';

    protected $fillable = [
        'date',
        'produit',
        'affectationService',
        'affectationDirection',
        'affectationDirectionGenerale',
        'centre',
        'centreRegional',
        'quantite',
        'montant',
        'montantTTC',
        'montantHT',
        'suiviBudgetaire',
        'localisation_id',

    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
