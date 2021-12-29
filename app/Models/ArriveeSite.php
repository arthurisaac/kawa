<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArriveeSite extends Model
{
    protected $fillable = [
        'noTournee',
        'site',
        'operation',
        'dateArrivee',
        'heureArrivee',
        'debutOperation',
        'finOperation',
        'tempsOperation',
        'nombre_colis',
        'asObservation',
        'asDestination',
        'asDepartSite',
        'asKm',
        'localisation_id',
        /*'heureArrivee',
        'kmArrivee',
        'observation',
        'noBordereau',
        'centre',
        'centre_regional',*/
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
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id')
            ->with('clients');
    }

    public function ArriveeColis()
    {
        return $this->hasMany('App\Models\ArriveeSiteColis', 'arrivee_site', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
