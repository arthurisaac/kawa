<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseServiceOperatrice extends Model
{
    protected $fillable = [
        'caisseService',
        'operatriceCaisse',
        'numeroOperatriceCaisse',
        'operatriceCaisseBox',
        'heureArrivee',
        'heureDepart',
        'localisation_id',
    ];

    public function operatrice()
    {
        return $this->belongsTo('App\Models\Personnel', 'operatriceCaisse', 'id');
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
