<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationBordereau extends Model
{
    protected $table = 'regulation_bordereau';

    protected $fillable = [
        'date',
        'heure',
        'stockInitial',
        'numeroDebut',
        'numeroFin',
        'quantite',
        'stockTotal',
        'seuilAlerte1',
        'seuilAlerte2',
        'seuilAlerte3',
        'dateAffection',
        'centre',
        'centreRegional',
        'typeAffectation',
        'responsable',
        'numeroDebutAffection',
        'numeroFinAffection',
        'quantiteAffectee',
        'stockActuel',

    ];
}
