<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeureSupp extends Model
{
    protected $fillable = [
        'date',
        'typeDate',
        'idPersonnel',
        'heureArrivee',
        'heureArrivee1',
        'heureArrivee2',
        'heureArrivee3',
        'heureDepart',
        'heureDepart1',
        'heureDepart2',
        'heureDepart3',
        'localisation_id',
    ];

    public function personnels()
    {
        return $this->belongsTo('App\Models\Personnel', 'idPersonnel', 'id');
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
