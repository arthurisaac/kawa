<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarburantCarte extends Model
{
    protected $fillable = [
        'numeroCarte',
        'societe',
        'idVehicule',
        'dateAquisition',
        'localisation_id',
        ];
}
