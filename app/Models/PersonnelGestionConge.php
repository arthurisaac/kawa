<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionConge extends Model
{
    protected $fillable = [
        'dernier',
        'prochain',
        'jourPris',
        'personnel',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
