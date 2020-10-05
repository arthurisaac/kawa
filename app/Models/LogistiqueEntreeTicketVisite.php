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

    ];

}
