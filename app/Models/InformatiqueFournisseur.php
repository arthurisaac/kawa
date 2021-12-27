<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueFournisseur extends Model
{
    protected $table = 'informatique_fournisseurs';

    protected $fillable = [
        'libelleFournisseur',
        'specialite',
        'localisation',
        'nationalite',
        'email',
        'contact',
        'localisation_id',

    ];
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
