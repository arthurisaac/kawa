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
