<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegulationScelle extends Model
{
    protected $table = 'regulation_scelles';

    protected $fillable = [
        'date',
        'numeroDebut',
        'numeroFin',
        'site',
        'client',
        'prixUnitaire',
        'quantite',
        'prixTotal',

    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'date',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/regulation-scelles/'.$this->getKey());
    }
}
