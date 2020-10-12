<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogistiqueProduit extends Model
{
    protected $fillable = [
        'fournisseur',
        'reference',
        'libelle',
        'description',
        'seuil',
        'stockAlert',
        'ves',
        'prix',
    ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\LogistiqueFournisseur', 'fournisseur', 'id');
    }
}
