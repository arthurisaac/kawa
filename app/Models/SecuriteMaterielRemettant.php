<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecuriteMaterielRemettant extends Model
{
    protected $fillable = [
        'idMateriel',
        'remettantPieceVehicule',
        'remettantPieceVehiculeQuantite',
        'remettantPieceVehiculeHeureRetour',
        'remettantPieceVehiculeConvoyeur',
        'remettantCleVehicule',
        'remettantCleVehiculeQuantite',
        'remettantCleVehiculeHeureRetour',
        'remettantCleVehiculeConvoyeur',
        'remettantTelephone',
        'remettantTelephoneQuantite',
        'remettantTelephoneHeureRetour',
        'remettantTelephoneConvoyeur',
        'remettantRadio',
        'remettantRadioQuantite',
        'remettantRadioHeureRetour',
        'remettantRadioConvoyeur',
        'remettantGBP',
        'remettantGBPQuantite',
        'remettantGBPHeureRetour',
        'remettantGBPConvoyeur',
        'remettantPA',
        'remettantPAQuantite',
        'remettantPAHeureRetour',
        'remettantPAConvoyeur',
        'remettantFP',
        'remettantFPQuantite',
        'remettantFPHeureRetour',
        'remettantFPConvoyeur',
        'remettantPM',
        'remettantPMQuantite',
        'remettantPMHeureRetour',
        'remettantPMConvoyeur',
        'remettantMunition',
        'remettantMunitionQuantite',
        'remettantMunitionHeureRetour',
        'remettantMunitionConvoyeur',
        'remettantTAG',
        'remettantTAGQuanite',
        'remettantTAGHeureRetour',
        'remettantTAGConvoyeur',
        'remettantMunitionPA',
        'remettantMunitionPAQuantite',
        'beneficiaireMunitionPAHeureRetour',
        'remettantMunitionPAConvoyeur',
        'remettantMunitionPAHeureRetour',
        'remettantMunitionFM',
        'remettantMunitionFMQuantite',
        'beneficiaireMunitionFMHeureRetour',
        'remettantMunitionFMConvoyeur',
        'remettantMunitionFMHeureRetour',
        'remettantMunitionFP',
        'remettantMunitionFPQuantite',
        'beneficiaireMunitionFPHeureRetour',
        'remettantMunitionFPConvoyeur',
        'remettantMunitionFPHeureRetour',
    ];

    public function materiels()
    {
        return $this->belongsTo('App\Models\SecuriteMateriel', 'idMateriel', 'id');
    }
}
