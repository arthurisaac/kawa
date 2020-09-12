<?php

namespace App;

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
        'litrage'
    ];
}
