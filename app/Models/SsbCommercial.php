<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SsbCommercial extends Model
{
    protected $fillable = [
        'nomClient',
        'situationGeographique',
        'telephoneClient',
        'regimeImpot',
        'boitePostale',
        'ville',
        'rc',
        'ncc',
        'nomContact',
        'emailContact',
        'portefeuilleClient',
        'fonction',
        'telephoneContact',
        'secteurActivite',
        'numeroContrat',
        'dateEffet',
        'dureeContrat',
        'objetArretePhysique',
        'objetArreteComptable',
        'objetApprovisionnement',
        'objetNiveau1',
        'objetNiveau2',
        'objetNiveau3',
        'objetAccompagnement',
        'baseArretePhysique',
        'baseArreteComptable',
        'baseApprovisionnement',
        'baseNiveau1',
        'baseNiveau2',
        'baseNiveau3',
        'baseAccompagnement',
        'coutUnitaire',
        'coutForfaitaire',
        'montant',

    ];
}
