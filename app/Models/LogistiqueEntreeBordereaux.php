<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueEntreeBordereaux extends Model
{
    protected $table = 'logistique_entree_bordereaux';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'fournisseur',
        'prixUnitaire',
    ];
}
