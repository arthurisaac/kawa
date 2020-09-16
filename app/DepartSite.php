<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartSite extends Model
{
    protected $fillable = [
        'date',
        'vehicule',
        'chefDeBord',
        'chauffeur',
        'numeroSite',
        'site',
        'finOp',
        'heureDepart',
        'kmDepart',
        'bordereau',
        'destination',
        'observation',
        ];
}
