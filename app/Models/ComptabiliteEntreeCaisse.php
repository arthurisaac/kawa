<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComptabiliteEntreeCaisse extends Model
{
    protected $fillable = [
        'date',
        'somme',
        'motif',
        'deposant',
        'service',

    ];
}
