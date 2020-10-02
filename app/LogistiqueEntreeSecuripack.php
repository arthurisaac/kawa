<?php

namespace App;

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
        return url('/admin/logistique-entree-securipacks/'.$this->getKey());
    }
}
