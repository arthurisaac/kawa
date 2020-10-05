<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueEntreeSecuripack extends Model
{
    protected $table = 'logistique_entree_securipack';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'fournisseur',
        'prixUnitaire',
        'reference',

    ];
}
