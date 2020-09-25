<?php

namespace App;

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
    ];
}
