<?php

namespace App\Models;

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
