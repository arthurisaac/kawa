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
        'localisation_id',
    ];

    public function chauffeurTitulaires()
    {
        return $this->belongsTo('App\Models\Personnel', 'chauffeurTitulaire', 'id');
    }
    public function chauffeurSuppleants()
    {
        return $this->belongsTo('App\Models\Personnel', 'chauffeurSuppleant', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
