<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationStockEntree extends Model
{
    protected $fillable = [
        "numero",
        "date",
        "centre",
        "centre_regional",
        "libelle",
        "fournisseur",
        'localisation_id',
    ];

    public function items()
    {
        return $this->hasMany('App\Models\RegulationStockEntreeItem', 'stock_entree');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
