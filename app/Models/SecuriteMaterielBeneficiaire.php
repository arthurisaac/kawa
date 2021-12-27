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
        'localisation_id',
        ];

    public function materiels()
    {
        return $this->belongsTo('App\Models\SecuriteMateriel', 'idMateriel', 'id');
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
