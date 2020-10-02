<?php

namespace App;

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


    protected $dates = [
        'created_at',
        'updated_at',
        'debutSerie',
        'finSerie',
        'date',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/logistique-sortie-ticket-visites/'.$this->getKey());
    }
}
