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
    ];
}
