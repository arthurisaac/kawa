<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartCentre extends Model
{
    protected $fillable = [
        'noTournee',
        'heureDepart',
        'kmDepart',
        'observation',
        'niveauCarburant',
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
