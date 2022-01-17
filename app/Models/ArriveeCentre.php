<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArriveeCentre extends Model
{
    protected $fillable = [
        'noTournee',
        'heureArrivee',
        'kmArrive',
        'observation',
        'niveauCarburant',
        'finTournee',
        'dateArrivee',
        'localisation_id',
    ];

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id')
            ->with('vehicules')
            ->with('agentDeGardes')
            ->with('chauffeurs')
            ->with('chefDeBords');
    }
}
