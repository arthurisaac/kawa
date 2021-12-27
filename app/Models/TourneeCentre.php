<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TourneeCentre extends Model
{
    protected $fillable = [
        'noTournee',
        'centre',
        'centreRegional',
        'dateDebut',
        'dateFin',
        'localisation_id',
    ];

    /*public function personnesChef()
    {
        return $this->belongsTo('App\Models\Personnel', 'chefDeBord', 'id');
    }
    public function personnesChauffeur()
    {
        return $this->belongsTo('App\Models\Personnel', 'chauffeur', 'id');
    }
    public function personnesDeGarde()
    {
        return $this->belongsTo('App\Models\Personnel', 'agentDeGarde', 'id');
    }*/

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id');
    }

    function details() {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id')
            ->with('chauffeurs')
            ->with('vehicules')
            ->with('chefDeBords')
            ->with('agentDeGardes');
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
