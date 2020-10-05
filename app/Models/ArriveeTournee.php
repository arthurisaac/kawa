<?php

namespace App\Models;

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
        'kmDepart',
        'heureDepart',
        'vidangeGenerale',
        'visiteTechnique',
        'vidangeCourroie',
        'patente',
        'assuranceFin',
        'assuranceHeurePont'
    ];
}
