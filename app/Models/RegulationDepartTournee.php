<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationDepartTournee extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'noTournee',
        'totalMontant',
        'totalColis',
    ];
}
