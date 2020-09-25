<?php

namespace App;

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
        return $this->belongsTo('App\LogistiqueFournisseur', 'fournisseur', 'id');
    }
}
