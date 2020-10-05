<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComptabiliteDegradation extends Model
{
    protected $table = 'comptabilite_degradations';

    protected $fillable = [
        'dateDegradation',
        'conteneur',
        'lieu',
        'details',
        'destinationProvenance',
        'site',
        'client',
        'commentaire',
        'conteneurEnleve',
        'conteneurAvecFonds',
        'montant',
        'dateDeclaration',
        'bordereau',

    ];
}
