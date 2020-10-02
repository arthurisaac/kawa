<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationSecuripack extends Model
{
    protected $table = 'regulation_securipack';

    protected $fillable = [
        'date',
        'typeSecuripack',
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
        return url('/admin/regulation-securipacks/'.$this->getKey());
    }
}
