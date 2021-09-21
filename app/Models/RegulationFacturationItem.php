<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationFacturationItem extends Model
{
    protected $fillable = [
        'facturation',
        'libelle',
        'qte',
        'pu',
        'reference',
        'debut',
        'fin',
        'montant',
    ];
}
