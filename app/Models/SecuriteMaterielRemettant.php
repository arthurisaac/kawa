<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecuriteMaterielRemettant extends Model
{
    protected $fillable = [
        'idMateriel',
        'remettantPieceVehicule',
        'remettantPieceVehiculeQuantite',
        'remettantPieceVehiculeRemise',
        'remettantPieceVehiculeConvoyeur',
        'remettantPieceVehiculeRetour',
        'remettantCleVehicule',
        'remettantCleVehiculeQuantite',
        'remettantCleVehiculeRemise',
        'remettantCleVehiculeConvoyeur',
        'remettantCleVehiculeRetour',
        'remettantTelephone',
        'remettantTelephoneQuantite',
        'remettantTelephoneRemise',
        'remettantTelephoneConvoyeur',
        'remettantTelephoneRetour',
        'remettantRadio',
        'remettantRadioQuantite',
        'remettantRadioRemise',
        'remettantRadioConvoyeur',
        'remettantRadioRetour',
        'remettantGBP',
        'remettantGBPQuantite',
        'beneficiaireGBPRemise',
        'remettantGBPConvoyeur',
        'remettantGBPRetour',
        'remettantPA',
        'remettantPAQuantite',
        'remettantPARemise',
        'remettantPAConvoyeur',
        'remettantPARetour',
        'remettantFP',
        'remettantFPQuantite',
        'beneficiaireFPRemise',
        'remettantFPConvoyeur',
        'remettantFPRetour',
        'remettantPM',
        'remettantPMQuantite',
        'remettantPMRemise',
        'remettantPMConvoyeur',
        'remettantPMRetour',
        'remettantMunition',
        'remettantMunitionQuantite',
        'remettantMunitionRemise',
        'remettantMunitionConvoyeur',
        'remettantMunitionRetour',
        'remettantMunitionPA',
        'remettantMunitionPAQuantite',
        'remettantMunitionPARemise',
        'remettantMunitionPAConvoyeur',
        'remettantMunitionPARetour',
        'remettantMunitionFM',
        'remettantMunitionFMQuantite',
        'remettantMunitionFMRemise',
        'remettantMunitionFMConvoyeur',
        'remettantMunitionFMRetour',
        'remettantMunitionFP',
        'remettantMunitionFPQuantite',
        'remettantMunitionFPRemise',
        'remettantMunitionFPConvoyeur',
        'remettantMunitionFPRetour',
        'remettantTAG',
        'remettantTAGQuantite',
        'remettantTAGRemise',
        'remettantTAGConvoyeur',
        'remettantTAGRetour',
    ];

    public function materiels()
    {
        return $this->belongsTo('App\Models\SecuriteMateriel', 'idMateriel', 'id');
    }
}
