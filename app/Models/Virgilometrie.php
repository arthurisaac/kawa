<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Virgilometrie extends Model
{
    protected $table = 'virgilometries';

    protected $fillable = [
        'date',
        'nomPrenoms',
        'heureArrivee',
        'typePiece',
        'personneVisitee',
        'motif',
        'heureDepart',
        'observation',
        'photo',
        'localisation_id',

    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
