<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArriveeTournee extends Model
{
    protected $fillable = [
        'numeroTournee',
        'convoyeur1',
        'convoyeur2',
        'convoyeur3',
        'kmArrivee',
        'heureArrivee',
        'vidangeGenerale',
        'visiteTechnique',
        'vidangeCourroie',
        'patente',
        'assuranceFin',
        'assuranceHeurePont'
    ];
}
