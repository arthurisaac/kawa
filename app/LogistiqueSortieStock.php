<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogistiqueSortieStock extends Model
{
    protected $fillable = [
        'produit',
        'quantite',
        'dateSortie',
        'motif',
        'dateSaisie',
        'observation',
        'service',
    ];
}
