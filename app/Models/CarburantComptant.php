<?php

namespace App\Models;

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
