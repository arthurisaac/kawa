<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueEntreeTicketVisite extends Model
{
    protected $table = 'logistique_entree_ticket_visite';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'fournisseur',
        'prixUnitaire',
        'localisation_id',

    ];

    public static function booted()
    {
        static::creating(function ($modele){
            $modele->localisation_id = Auth::user()->localisation_id;
        });
    }

}
