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
}
