<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseEntreeColis extends Model
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
        'remettant',
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

    public function sites()
    {
        return $this->hasMany('App\Models\SiteDepartTournee', 'idTourneeDepart');
    }

    public function items()
    {
        return $this->hasMany('App\Models\CaisseEntreeColisItem', 'entree_colis');
    }

    public function caisses()
    {
        return $this->belongsTo('App\Models\CaisseEntreeColis', 'entree_colis', 'id')
            ->with('tournee');
    }
}
