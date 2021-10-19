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
    ];

    public function items()
    {
        return $this->hasMany('App\Models\RegulationStockSortieItem', 'stock_sortie');
    }
}
