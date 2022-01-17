<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarburantTicket extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'lieu',
        'numeroTicket',
        'numeroCarteCarburant',
        'idVehicule',
        'solde',
        'soldePrecedent',
        'utilisation',
        'kilometrage',
        'litrage',
        'centre',
        'centre_regional',
        'localisation_id',
    ];

    public function vehicules()
    {
        return $this->belongsTo('App\Models\Vehicule', 'idVehicule', 'id');
    }
}
