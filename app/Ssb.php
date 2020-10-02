<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ssb extends Model
{
    protected $table = 'ssb';

    protected $fillable = [
        'numeroIncident',
        'numeroBordereau',
        'site',
        'banque',
        'centre',
        'centreRegional',
        'intervention',
        'dabiste1',
        'dabiste2',
        'heureDeclaration',
        'heureReponse',
        'heureArrivee',
        'debutIntervention',
        'finIntervention',
        'dateCloture',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'dateCloture',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ssbs/'.$this->getKey());
    }
}
