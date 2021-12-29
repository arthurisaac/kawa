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
        'kmArrivee',
        'heureArrivee',
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
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
