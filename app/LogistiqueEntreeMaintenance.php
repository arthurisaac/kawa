<?php

namespace App;

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
        return url('/admin/logistique-entree-maintenances/'.$this->getKey());
    }
}
