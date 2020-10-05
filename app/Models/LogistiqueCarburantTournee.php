<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueCarburantTournee extends Model
{
    protected $table = 'logistique_carburant_tournee';

    protected $fillable = [
        'date',
        'heure',
        'lieu',
        'numeroTicket',
        'numeroCarte',
        'vehicule',
        'solde',
        'soldePrecedent',
        'utilisation',
        'kilometrage',
        'litrage',
    
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
        return url('/admin/logistique-carburant-tournees/'.$this->getKey());
    }
}
