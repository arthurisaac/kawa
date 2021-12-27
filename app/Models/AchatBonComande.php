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
        'localisation_id',
    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\AchatFournisseur', 'fournisseur_fk', 'id');
    }
}
