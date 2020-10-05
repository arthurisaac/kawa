<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueMission extends Model
{
    protected $fillable = [
        'centre',
        'centreRegional',
        'service',
        'debut',
        'fin',
        'nombreDeJours',
        'objetMission',
        'interventionEffectuee',
        'rapportMission',

    ];


}
