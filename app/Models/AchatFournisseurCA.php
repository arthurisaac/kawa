<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatFournisseurCA extends Model
{
    protected $fillable = [
        'fournisseur_fk',
        'annee',
        'ca',
        'localisation_id'
        ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\AchatFournisseur', 'fournisseur_fk', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
