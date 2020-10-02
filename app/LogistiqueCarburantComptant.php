<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueCarburantComptant extends Model
{
    protected $table = 'logistique_carburant_comptant';

    protected $fillable = [
        'vehicule',
        'date',
        'montant',
        'quantiteServie',
        'lieu',
        'utilisation',
    
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
        return url('/admin/logistique-carburant-comptants/'.$this->getKey());
    }
}
