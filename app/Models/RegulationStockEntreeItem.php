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
    ];
}
