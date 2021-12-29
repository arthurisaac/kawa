<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionMission extends Model
{
    protected $fillable = [
        "debut_mission",
        "fin_mission",
        "nombre_jours",
        "lieu",
        "motif",
        "frais",
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
