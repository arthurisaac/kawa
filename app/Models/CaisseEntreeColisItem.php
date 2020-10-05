<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseEntreeColisItem extends Model
{
    protected $fillable = [
        'entreeColis',
        'totalColis',
        'typeColisSecuripack',
        'typeColisSacjute',
        'nombreColisSecuripack',
        'nombreColisSacjute',
        'numeroScelleSecuripack',
        'numeroScelleSacjute',
        'montantAnnonceSecuripack',
        'montantAnnonceSacjute',
        'bordereau',
        'expediteur',
    ];
}
