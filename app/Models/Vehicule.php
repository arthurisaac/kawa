<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'immatriculation',
        'photo',
        'marque',
        'type',
        'code',
        'num_chassis',
        'DPMC',
        'dateAcquisition',
        'centre',
        'centreRegional',
        'chauffeurTitulaire',
        'chauffeurSuppleant',
    ];

    public function chauffeurTitulaire()
    {
        return $this->belongsTo('App\Models\Personnel', 'chauffeurTitulaire', 'id');
    }
    public function chauffeurSuppleant()
    {
        return $this->belongsTo('App\Models\Personnel', 'chauffeurSuppleant', 'id');
    }
}
