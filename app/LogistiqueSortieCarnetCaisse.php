<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieCarnetCaisse extends Model
{

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'service',
        'prixUnitaire',

    ];
}
