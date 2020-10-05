<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieApprovision extends Model
{
    protected $table = 'logistique_sortie_approvision';

    protected $fillable = [
        'debutSerie',
        'finSerie',
        'date',
        'service',
        'prixUnitaire',

    ];


}
