<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseSortieColisItem extends Model
{
    protected $fillable = [
        'sortieColis',
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
