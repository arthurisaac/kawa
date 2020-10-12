<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueCarburantComptant extends Model
{
    protected $table = 'logistique_carburant_comptant';

    protected $fillable = [
        'vehicule',
        'date',
        'montant',
        'quantiteServie',
        'lieu',
        'utilisation',

    ];
}
