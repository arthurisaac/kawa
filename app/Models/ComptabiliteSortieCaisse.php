<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComptabiliteSortieCaisse extends Model
{

    protected $fillable = [
        'date',
        'somme',
        'motif',
        'beneficiaire',
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
