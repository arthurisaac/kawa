<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieCommande extends Model
{
    protected $table = 'logistique_sortie_commande';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',
        'reference',

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
        return url('/admin/logistique-sortie-commandes/'.$this->getKey());
    }
}
