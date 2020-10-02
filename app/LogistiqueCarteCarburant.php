<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueCarteCarburant extends Model
{
    protected $table = 'logistique_carte_carburant';

    protected $fillable = [
        'numeroCarte',
        'societe',
        'numeroVehicule',
        'dateAquisition',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'dateAquisition',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/logistique-carte-carburants/'.$this->getKey());
    }
}
