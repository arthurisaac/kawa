<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieBordereaux extends Model
{
    protected $table = 'logistique_sortie_bordereaux';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'service',
        'prix',

    ];

}
