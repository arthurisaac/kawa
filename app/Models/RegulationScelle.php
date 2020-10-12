<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationScelle extends Model
{
    protected $table = 'regulation_scelles';

    protected $fillable = [
        'date',
        'numeroDebut',
        'numeroFin',
        'site',
        'client',
        'prixUnitaire',
        'quantite',
        'prixTotal',

    ];

}
