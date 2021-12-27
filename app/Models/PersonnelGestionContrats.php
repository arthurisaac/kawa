<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionContrats extends Model
{
    protected $fillable = [
        "type_contrat",
        "debut_contrat",
        "fin_contrat",
        "nombre_jours",
        "fonction",
        "salaire",
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
