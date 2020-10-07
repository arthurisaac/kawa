<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
        'matricule',
        'centre',
        'centreRegional',
        'securite',
        'transport',
        'caisse',
        'regulation',
        'siegeService',
        'siegeDirection',
        'siegeDirectionGenerale',
        'nomPrenoms',
        'dateNaissance',
        'dateEntreeSociete',
        'dateSortie',
        'typeSortie',
        'fonction',
        'service',
        'natureContrat',
        'numeroCNPS',
        'situationMatrimoniale',
        'nombreEnfants',
        'photo',
        'adresseGeographique',
        'contactPersonnel',
        'nomPere',
        'nomMere',
        'nomConjoint',
        'personneContacter',
        ];
}
