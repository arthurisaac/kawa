<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartTournee extends Model
{
    protected $fillable = [
        'numeroTournee',
        'date',
        'idVehicule',
        'chauffeur',
        'agentDeGarde',
        'chefDeBord',
        'coutTournee',
    ];
}
