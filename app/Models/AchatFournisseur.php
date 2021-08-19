<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatFournisseur extends Model
{

    protected $fillable = [
        'denomination',
        'sigle',
        'secteur_activite',
        'rccm',
        'cnps',
        'cpt',
        'adresse_postale',
        'adresse_geo',
        'telephone_entreprise',
        'email_entreprise',
        'fax',
        'siteweb',
        'fonction',
        'nom',
        'prenoms',
        'telephone',
        'email',
        'part_marche',
        'taux_croissance',
        'chaine_valeur',
        'certification',
        'sous_traitant',
        'condition',
        'mode_paiement',
    ];
}
