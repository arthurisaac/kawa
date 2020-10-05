<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueEntreeCommande extends Model
{
    protected $table = 'logistique_entree_commande';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'fournisseur',
        'prixUnitaire',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'debutSerie',
        'finSerie',
        'date',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/logistique-entree-commandes/'.$this->getKey());
    }
}
