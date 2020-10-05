<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueEntreeMaintenance extends Model
{
    protected $table = 'logistique_entree_maintenance';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'fournisseur',
        'prixUnitaire',

    ];
}
