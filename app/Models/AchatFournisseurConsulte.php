<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatFournisseurConsulte extends Model
{
    protected $fillable = [
        'fournisseur',
        'cotation_technique',
        'prix_propose',
        'choix',
        'achat_demandes_fk',
    ];

    public function fournisseurs()
    {
        return $this->belongsTo('App\Models\AchatFournisseur', 'fournisseur', 'id');
    }
}
