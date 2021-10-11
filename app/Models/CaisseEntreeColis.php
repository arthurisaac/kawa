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
    ];

    public function sites()
    {
        return $this->hasMany('App\Models\SiteDepartTournee', 'idTourneeDepart');
    }
}
