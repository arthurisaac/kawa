<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
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
