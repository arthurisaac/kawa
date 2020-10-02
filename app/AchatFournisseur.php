<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatFournisseur extends Model
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
        'numeroAgrement',

    ];
}
