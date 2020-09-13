<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarburantComptant extends Model
{
    protected $fillable = [
        'idVehicule',
        'date',
        'montant',
        'qteServie',
        'lieu',
        'utilisation',
    ];

    public function vehicules()
    {
        // return $this->hasOne('App\Vehicule', 'id');
        return $this->belongsTo('App\Vehicule', 'idVehicule', 'id');
    }
}
