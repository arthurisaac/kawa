<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourneeCentre extends Model
{
    protected $fillable = [
        'date',
        'tournee',
        'vehicule',
        'chefDeBord',
        'agentDeGarde',
        'chauffeur',
        'centre',
        'centreRegional',
        'dateDebut',
        'dateFin',
    ];

    public function personnesChef()
    {
        return $this->belongsTo('App\Personnel', 'chefDeBord', 'id');
    }
    public function personnesChauffeur()
    {
        return $this->belongsTo('App\Personnel', 'chauffeur', 'id');
    }
    public function personnesDeGarde()
    {
        return $this->belongsTo('App\Personnel', 'agentDeGarde', 'id');
    }

    public function vehicules()
    {
        return $this->belongsTo('App\Vehicule', 'vehicule', 'id');
    }
}
