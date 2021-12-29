<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionAffectations extends Model
{
    protected $fillable = [
        "date_affectation",
        "centre",
        "motif",
        "personnel",
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
