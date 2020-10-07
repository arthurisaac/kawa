<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueFournisseur extends Model
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
    ];
}
