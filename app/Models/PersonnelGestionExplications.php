<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionExplications extends Model
{
    protected $fillable = [
        "date_demande",
        "motif",
        "sanctions",
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
