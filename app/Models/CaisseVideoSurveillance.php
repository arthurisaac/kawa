<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseVideoSurveillance extends Model
{
    protected $fillable = [
        'date',
        'heureDebut',
        'heureFin',
        'numeroBox',
        'operatrice',
        'securipack',
        'sacjute',
        'numeroScelle',
        'ecart',
        'erreur',
        'absence',
        'commentaire',
        'centre',
        'centre_regional',
        'numero_bord',
        'remarque',
        'localisation_id',
    ];


    public function operatrices()
    {
        return $this->belongsTo('App\Models\CaisseServiceOperatrice', 'operatrice', 'id')->with("operatrice");
    }

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
