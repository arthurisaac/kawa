<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseService extends Model
{
    protected $fillable = [
        'date',
        'centre',
        'centreRegional',
        'chargeCaisse',
        'chargeCaisseHPS',
        'chargeCaisseHFS',
        'chargeCaisseAdjoint',
        'chargeCaisseAdjointHPS',
        'chargeCaisseAdjointHFS',
        'localisation_id',
    ];

    public function chargeCaisses()
    {
        return $this->belongsTo('App\Models\Personnel', 'chargeCaisse', 'id');
    }

    public function chargeCaisseAdjoints()
    {
        return $this->belongsTo('App\Models\Personnel', 'chargeCaisseAdjoint', 'id');
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
