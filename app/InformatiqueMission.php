<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueMission extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'debut',
        'fin',
        'objetMission',
        'interventionEffectuee',
        'rapportMission',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'debut',
        'fin',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/informatique-missions/'.$this->getKey());
    }
}
