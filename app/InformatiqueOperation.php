<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueOperation extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'date',
        'materielDefectueux',
        'rapportMateriel',
        'dateDebut',
        'dateFin',
        'opérationEffectuee',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'date',
        'dateDebut',
        'dateFin',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/informatique-operations/'.$this->getKey());
    }
}
