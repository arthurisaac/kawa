<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueMateriel extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'date_achat',
        'date_fin',
        'reference',
        'libelle',
        'quantite',
        'prixUnitaire',
        'montant',
        'factureJointe',
        'categorie',
        'caracteristique',
        'fournisseur',
    ];

}
