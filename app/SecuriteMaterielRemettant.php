<?php

namespace App;

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
    ];

    public function materiels()
    {
        return $this->belongsTo('App\SecuriteMateriel', 'idMateriel', 'id');
    }
}
