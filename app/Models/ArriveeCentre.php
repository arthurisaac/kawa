<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArriveeCentre extends Model
{
    protected $fillable = [
        'date',
        'tournee',
        'vehicule',
        'chefDeBord',
        'agentDeGarde',
        'chauffeur',
        'heureArrivee',
        'kmArrive',
        'observation',
        ];
}
