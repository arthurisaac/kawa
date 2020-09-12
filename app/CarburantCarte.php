<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarburantCarte extends Model
{
    protected $fillable = [
        'numeroCarte',
        'societe',
        'idVehicule',
        'dateAquisition',
        ];
}
