<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueCarteCarburant extends Model
{
    protected $table = 'logistique_carte_carburant';

    protected $fillable = [
        'numeroCarte',
        'societe',
        'numeroVehicule',
        'dateAquisition',

    ];


}
