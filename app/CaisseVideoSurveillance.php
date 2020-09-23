<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaisseVideoSurveillance extends Model
{
    protected $fillable = [
        'date',
        'heureDebut',
        'heureFin',
        'numeroBox',
        'operatrice',
        'securipack',
        'sacjute',
        'numeroScelle',
        'ecart',
        'erreur',
        'absence',
        'commentaire',
    ];
}
