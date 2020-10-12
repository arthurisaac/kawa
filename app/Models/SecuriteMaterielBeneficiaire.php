<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecuriteMaterielBeneficiaire extends Model
{
    protected $fillable = [
        'idMateriel',
        'beneficiairePieceVehicule',
        'beneficiairePieceVehiculeQuantite',
        'beneficiairePieceVehiculeHeureRetour',
        'beneficiairePieceVehiculeConvoyeur',
        'beneficiaireCleVehicule',
        'beneficiaireCleVehiculeQuantite',
        'beneficiaireCleVehiculeHeureRetour',
        'beneficiaireCleVehiculeConvoyeur',
        'beneficiaireTelephone',
        'beneficiaireTelephoneQuantite',
        'beneficiaireTelephoneHeureRetour',
        'beneficiaireTelephoneConvoyeur',
        'beneficiaireRadio',
        'beneficiaireRadioQuantite',
        'beneficiaireRadioHeureRetour',
        'beneficiaireRadioConvoyeur',
        'beneficiaireGBP',
        'beneficiaireGBPQuantite',
        'beneficiaireGBPHeureRetour',
        'beneficiaireGBPConvoyeur',
        'beneficiairePA',
        'beneficiairePAQuantite',
        'beneficiairePAHeureRetour',
        'beneficiairePAConvoyeur',
        'beneficiaireFP',
        'beneficiaireFPQuantite',
        'beneficiaireFPHeureRetour',
        'beneficiaireFPConvoyeur',
        'beneficiairePM',
        'beneficiairePMQuantite',
        'beneficiairePMHeureRetour',
        'beneficiairePMConvoyeur',
        'beneficiaireMunition',
        'beneficiaireMunitionQuantite',
        'beneficiaireMunitionHeureRetour',
        'beneficiaireMunitionConvoyeur',
        'beneficiaireTAG',
        'beneficiaireTAGQuanite',
        'beneficiaireTAGHeureRetour',
        'beneficiaireTAGConvoyeur',
        ];

    public function materiels()
    {
        return $this->belongsTo('App\Models\SecuriteMateriel', 'idMateriel', 'id');
    }
}
