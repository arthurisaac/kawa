<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationService extends Model
{
    protected $table = 'regulation_service';

    protected $fillable = [
        'centre',
        'centreRegional',
        'chargeeRegulation',
        'chargeeRegulationHPS',
        'chargeeRegulationHFS',
        'chargeeRegulationAdjointe',
        'chargeeRegulationAdjointeHPS',
        'chargeeRegulationAdjointeHFS',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/regulation-services/'.$this->getKey());
    }
}
