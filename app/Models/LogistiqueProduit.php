<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueProduit extends Model
{
    protected $fillable = [
        'fournisseur',
        'reference',
        'libelle',
        'description',
        'seuil',
        'stockAlert',
        'ves',
        'prix',
        'localisation_id',
    ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\LogistiqueFournisseur', 'fournisseur', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
