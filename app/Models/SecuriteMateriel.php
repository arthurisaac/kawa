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

    public function ccs()
    {
        return $this->belongsTo('App\Models\Personnel', 'ccMatricule', 'id');
    }

    public function cgs()
    {
        return $this->belongsTo('App\Models\Personnel', 'cgMatricule', 'id');
    }

    public function operateurRadios()
    {
        return $this->belongsTo('App\Models\Personnel', 'operateurRadioMatricule', 'id');
    }

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id');
    }
}
