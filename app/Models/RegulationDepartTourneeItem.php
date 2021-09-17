<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegulationDepartTourneeItem extends Model
{
    protected $fillable = [
        'regulation_depart',
        'site',
        'client',
        'nature',
        'nbre_colis',
        'numero_scelle',
        'montant',
    ];

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id')
            ->with('clients');
    }
}
