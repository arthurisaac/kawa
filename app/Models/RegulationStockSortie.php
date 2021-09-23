<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationStockSortie extends Model
{
    protected $fillable = [
        "numero",
        "date",
        "centre",
        "centre_regional",
        "libelle",
        "service",
    ];
}
