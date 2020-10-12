<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationService extends Model
{

    protected $fillable = [
        'date',
        'centre',
        'centreRegional',
        'chargeeRegulation',
        'chargeeRegulationHPS',
        'chargeeRegulationHFS',
        'chargeeRegulationAdjointe',
        'chargeeRegulationAdjointeHPS',
        'chargeeRegulationAdjointeHFS',

    ];

    public function chargeRegulations()
    {
        return $this->belongsTo('App\Models\Personnel', 'chargeeRegulation', 'id');
    }

    public function chargeRegulationAdjointes()
    {
        return $this->belongsTo('App\Models\Personnel', 'chargeeRegulationAdjointe', 'id');
    }
}
