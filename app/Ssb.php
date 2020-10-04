<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ssb extends Model
{
    protected $table = 'ssb';

    protected $fillable = [
        'numeroIncident',
        'numeroBordereau',
        'site',
        'banque',
        'centre',
        'centreRegional',
        'intervention',
        'dabiste1',
        'dabiste2',
        'heureDeclaration',
        'heureReponse',
        'heureArrivee',
        'debutIntervention',
        'finIntervention',
        'dateCloture',

    ];

}
