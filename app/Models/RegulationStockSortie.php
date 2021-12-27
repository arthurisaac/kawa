<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationStockSortie extends Model
{
    protected $fillable = [
        "date",
        "centre",
        "centre_regional",
        "service",
        "receveur",
        'localisation_id',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\RegulationStockSortieItem', 'stock_sortie');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
