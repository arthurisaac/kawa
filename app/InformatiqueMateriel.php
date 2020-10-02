<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueMateriel extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'date',
        'reference',
        'libelle',
        'quantite',
        'prixUnitaire',
        'montant',
        'factureJointe',
    
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
        return url('/admin/informatique-materiels/'.$this->getKey());
    }
}
