<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convoyeur extends Model
{
    protected $fillable = [
        'matricule',
        'nomPrenoms',
        'dateNaissance',
        'fonction',
        'dateEmbauche',
        'photo',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
