<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationConfirmationClient extends Model
{
    protected $table = 'regulation_confirmation_client';

    protected $fillable = [
        'bordereau',
        'destination',
        'montant',
        'scelle',
        'expediteur',
        'client',
        'destinataire',
        'dateReception',
        'lieu',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'dateReception',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/regulation-confirmation-clients/'.$this->getKey());
    }
}
