<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformatiqueOperation extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'date',
        'materielDefectueux',
        'rapportMateriel',
        'dateDebut',
        'dateFin',
        'opérationEffectuee',

    ];
}
