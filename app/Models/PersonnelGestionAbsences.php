<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionAbsences extends Model
{
    protected $fillable = [
        "debut_absence",
        "fin_absence",
        "nombre_jours",
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
