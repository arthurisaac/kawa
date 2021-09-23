<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationStockSortieItem extends Model
{
    protected $fillable = [
        "stock_sortie",
        "qte_prevu",
        "qte_sortie",
        "debut",
        "fin",
        "reste",
        "autre",
    ];
}
