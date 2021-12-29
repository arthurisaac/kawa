<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArriveeSiteColis extends Model
{
    protected $fillable = [
        'arrivee_site',
        'colis',
        'num_colis',
        'bordereau',
        'montant',
        'nature',
        'nombre_colis',
        'localisation_id',
    ];

    public function ArriveeSites()
    {
        return $this->hasMany('App\Models\ArriveeSites', 'arrivee_site', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
