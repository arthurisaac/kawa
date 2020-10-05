<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieTicketVisite extends Model
{
    protected $table = 'logistique_sortie_ticket_visite';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',
        'reference',

    ];

}
