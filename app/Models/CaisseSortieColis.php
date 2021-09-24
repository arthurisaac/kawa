<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseSortieColis extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'centre',
        'centre_regional',
        'observation',
        'totalMontant',
        'totalColis',
    ];
}
