<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convoyeur extends Model
{
    protected $fillable = [
        'matricule',
        'nomPrenoms',
        'dateNaissance',
        'fonction',
        'dateEmbauche',
        'photo',
    ];
}
