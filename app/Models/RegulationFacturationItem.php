<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationFacturationItem extends Model
{
    protected $fillable = [
        'facturation',
        'libelle',
        'qte',
        'pu',
        'reference',
        'debut',
        'fin',
        'montant',
    ];

    public function facture()
    {
        return $this->belongsTo('App\Models\RegulationFacturation', 'facturation', 'id');
    }
}
