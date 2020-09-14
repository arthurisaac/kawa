<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartCentre extends Model
{
    protected $fillable = [
        'date',
        'noTournee',
        'vehicule',
        'chefDeBord',
        'agentDeGarde',
        'chauffeur',
        'heureDepart',
        'kmDepart',
        'observation',
    ];
}
