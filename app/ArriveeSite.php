<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArriveeSite extends Model
{
    protected $fillable = [
        'numeroSite',
        'site',
        'date',
        'vehicule',
        'chefDeBord',
        'chauffeur',
        'heureDepart',
        'kmDepart',
        'observation',
    ];
}
