<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatFournisseurCA extends Model
{
    protected $fillable = [
        'fournisseur_fk',
        'annee',
        'ca'
        ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\AchatFournisseur', 'fournisseur_fk', 'id');
    }
}
