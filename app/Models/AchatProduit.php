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

    ];
}
