<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatBonComandeItem extends Model
{
    protected $fillable = [
        'achat_bon_fk',
        'designation',
        'quantite',
        'prix',
        'tva',
        'montant',
        'localisation_id',
    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

    public function bons()
    {
        return $this->belongsTo('App\Models\AchatBonComande', 'achat_bon_fk', 'id');
    }
}
