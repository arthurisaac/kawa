<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatDemande extends Model
{
    protected $fillable = [
        'date',
        'identite',
        'service',
        'nom_demandeur',
        'telephone_demandeur',
        'adresse_electronique_demandeur',
        'objet_achat',
        'sous_famille_achat',
        'famille_achat',
        'fournisseur_retenu',
        'montant_retenu',
        'type_demande',
        'nature_demande',
        'numero_da',
        'centre',
        'centre_regional',
        'demande',
        'localisation_id',
    ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\AchatFournisseur', 'fournisseur_retenu', 'id');
    }
}
