<?php

namespace App;

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
