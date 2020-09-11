<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'immatriculation',
        'photo',
        'marque',
        'type',
        'code',
        'num_chassis',
        'DPMC',
        'dateAcquisition',
        'centre',
        'centreRegional',
        'chauffeurTitulaireNom',
        'chauffeurTitulairePrenom',
        'chauffeurTitulaireDateAffection',
        'chauffeurTitulaireFonction',
        'chauffeurTitulaireMatricule',
        'chauffeurSuppleantNom',
        'chauffeurSuppleantPrenom',
        'chauffeurSuppleantFonction',
        'chauffeurSuppleantMatricule',
        'chauffeurSuppleantDateAffection'
    ];
}
