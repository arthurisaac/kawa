<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartSiteColis extends Model
{
    protected $fillable = [
        'totalColis',
        'typeColisSecuripack',
        'typeColisSacjute',
        'nombreColisSecuripack',
        'nombreColisSacjute',
        'numeroScelleSecuripack',
        'numeroScelleSacjute',
        'montantAnnonceSecuripack',
        'montantAnnonceSacjute',
        'departSite',
    ];
}
