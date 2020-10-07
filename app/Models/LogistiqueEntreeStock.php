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
    ];
}
