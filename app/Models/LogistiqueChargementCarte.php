<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueChargementCarte extends Model
{
    protected $fillable = [
        'carte',
        'date',
        'somme',
        'service',
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
