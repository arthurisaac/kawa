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
        'localisation_id',
    ];

    public function vehicules()
    {
        return $this->belongsTo('App\Models\Vehicule', 'idVehicule', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
