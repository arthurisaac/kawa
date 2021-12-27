<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueFournisseur extends Model
{
    protected $fillable = [
        'societe',
        'civilite',
        'nom',
        'prenom',
        'adresse',
        'pays',
        'telephone',
        'mobile',
        'fax',
        'email',
        'observation',
        'domaine',
        'delaiLivraison',
        'conditionPaiement',
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
