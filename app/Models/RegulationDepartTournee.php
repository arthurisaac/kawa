<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationDepartTournee extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'noTournee',
        'totalMontant',
        'totalColis',
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
