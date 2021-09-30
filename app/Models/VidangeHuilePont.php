<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VidangeHuilePont extends Model
{
    protected $fillable = [
        'date',
        'idVehicule',
        'kmActuel',
        'prochainKm',
    ];

    public function vehicules()
    {
        return $this->belongsTo('App\Models\Vehicule', 'idVehicule', 'id');
    }
}
