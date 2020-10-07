<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueChargementCarte extends Model
{
    protected $fillable = [
        'carte',
        'date',
        'somme',
        'service',
    ];
}
