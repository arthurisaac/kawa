<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionNiveauCarburant extends Model
{
    protected $fillable = [
        'option',
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
