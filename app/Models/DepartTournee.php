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
        'heureArrivee'
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
}
