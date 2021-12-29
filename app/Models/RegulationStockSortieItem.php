<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationStockSortieItem extends Model
{
    protected $fillable = [
        "date",
        "stock_sortie",
        "qte_prevu",
        "qte_sortie",
        "debut",
        "fin",
        "reference",
        "libelle",
        "autre",
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
