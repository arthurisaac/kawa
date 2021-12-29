<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionSanction extends Model
{
    protected $fillable = [
        "date",
        "sanction",
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
