<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecuriteMateriel extends Model
{
    protected $fillable = [
        'date',
        'cbNom',
        'cbMatricule',
        'ccMatricule',
        'cgMatricule',
        'vehiculeVB',
        'vehiculeVL',
        'noTournee',
        'operateurRadio',
        'operateurRadioMatricule',
        'operateurRadioHeurePrise',
        'operateurRadioHeureFin'
    ];

    public function cbs()
    {
        return $this->belongsTo('App\Models\Personnel', 'cbMatricule', 'id');
    }

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id');
    }
}
