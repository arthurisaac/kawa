<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationFacturation extends Model
{
    protected $table = 'regulation_facturation';

    protected $fillable = [
        'date',
        'typeFacturation',
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
        return url('/admin/regulation-facturations/'.$this->getKey());
    }
}
