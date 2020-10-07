<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecuriteMateriel extends Model
{
    protected $fillable = [
        'date',
        'cbNom',
        'cbPrenom',
        'cbFonction',
        'cbMatricule',
        'ccNom',
        'ccPrenom',
        'ccFonction',
        'ccMatricule',
        'cgNom',
        'cgPrenom',
        'cgFonction',
        'cgMatricule',
        'vehiculeVB',
        'vehiculeVL',
        'noTournee',
        'operateurRadio',
        'operateurRadioNom',
        'operateurRadioPrenom',
        'operateurRadioFonction',
        'operateurRadioMatricule',
        'operateurRadioHeurePrise',
        'operateurRadioHeureFin'
    ];
}
