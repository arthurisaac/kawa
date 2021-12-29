<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatFournisseurConsulte extends Model
{
    protected $fillable = [
        'fournisseur',
        'cotation_technique',
        'prix_propose',
        'choix',
        'achat_demandes_fk',
        'localisation_id',
    ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\AchatFournisseur', 'fournisseur', 'id');
    }
    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }
}
