<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationStockEntreeItem extends Model
{
    protected $fillable = [
        "stock_entree",
        "qte_attendu",
        "qte_livree",
        "debut",
        "fin",
        "reste",
        "autre",
        "colis",
        "date",
        'localisation_id',
    ];
    public function stocks()
    {
        return $this->belongsTo('App\Models\RegulationStockEntree', 'stock_entree', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
