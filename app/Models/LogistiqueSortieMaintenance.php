<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieMaintenance extends Model
{
    protected $table = 'logistique_sortie_maintenance';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',

    ];

}
