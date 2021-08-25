<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatBonComande extends Model
{
    protected $fillable = [
        'date',
        'numero',
        'fournisseur_fk',
        'numero_da',
        'proforma',
        'telephone',
        'operation',
        'objet',
        'total',
        'livraison',
    ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\AchatFournisseur', 'fournisseur_fk', 'id');
    }
}
