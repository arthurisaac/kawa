<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieBordereaux extends Model
{
    protected $table = 'logistique_sortie_bordereaux';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'service',
        'prix',
        'localisation_id',

    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

}
