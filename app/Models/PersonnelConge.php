<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelConge extends Model
{
    protected $fillable = [
        'dateDernierDepartConge',
        'dateProchainDepartConge',
        'nombreJourPris',
        'nombreJourRestant',
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
