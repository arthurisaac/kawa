<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarburantPrevision extends Model
{
    protected $fillable = [
        'dateDu',
        'dateAu',
        'axe',
        'typeVehicule',
        'distance',
        'conso100',
        'litrage',
        'coutCarburant',
        'dessSemaine',
        'coutSemaine',
        'dessMois',
        'coutMois'
    ];
}
