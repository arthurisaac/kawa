<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieSecuripack extends Model
{
    protected $table = 'logistique_sortie_securipack';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'centre',
        'prixUnitaire',
        'reference',

    ];
}
