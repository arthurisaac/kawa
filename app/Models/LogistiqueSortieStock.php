<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieStock extends Model
{
    protected $fillable = [
        'produit',
        'quantite',
        'dateSortie',
        'motif',
        'dateSaisie',
        'observation',
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
