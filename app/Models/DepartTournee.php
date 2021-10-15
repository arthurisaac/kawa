<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartTournee extends Model
{
    protected $fillable = [
        'numeroTournee',
        'date',
        'idVehicule',
        'chauffeur',
        'agentDeGarde',
        'chefDeBord',
        'coutTournee',
        'kmDepart',
        'heureDepart',
        'kmArrivee',
        'heureArrivee',
        'centre',
        'centre_regional',
        'heure_arrivee_regulation'
    ];

    public function agentDeGardes()
    {
        return $this->belongsTo('App\Models\Personnel', 'agentDeGarde', 'id');
    }

    public function chefDeBords()
    {
        return $this->belongsTo('App\Models\Personnel', 'chefDeBord', 'id');
    }

    public function chauffeurs()
    {
        return $this->belongsTo('App\Models\Personnel', 'chauffeur', 'id');
    }

    public function vehicules()
    {
        return $this->belongsTo('App\Models\Vehicule', 'idVehicule', 'id');
    }

    public function departCentre()
    {
        return $this->hasOne('App\Models\DepartCentre', 'noTournee');
    }

    public function arriveeCentre()
    {
        return $this->hasOne('App\Models\ArriveeCentre', 'noTournee');
    }

    public function arriveeSites()
    {
        return $this->hasOne('App\Models\ArriveeSite', 'noTournee')
            ->with("sites");
    }

    public function sites()
    {
        return $this->hasMany('App\Models\SiteDepartTournee', 'idTourneeDepart');
    }
}
