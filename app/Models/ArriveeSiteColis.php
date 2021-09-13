<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArriveeSiteColis extends Model
{
    protected $fillable = [
        'arrivee_site',
        'site',
        'colis',
        'num_colis',
        'bordereau',
        'montant',
        'nature',
    ];
}
