<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseSortieColis extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'centre',
        'centre_regional',
        'observation',
        'totalMontant',
        'totalColis',
        'noTournee',
        'receveur',
    ];

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id')
            ->with('vehicules')
            ->with('agentDeGardes')
            ->with('chauffeurs')
            ->with('chefDeBords');
    }

    public function sites()
    {
        return $this->hasMany('App\Models\SiteDepartTournee', 'idTourneeDepart');
    }
}
