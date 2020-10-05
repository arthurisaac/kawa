<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueFournisseur extends Model
{
    protected $table = 'informatique_fournisseurs';

    protected $fillable = [
        'libelleFournisseur',
        'specialite',
        'localisation',
        'nationalite',
        'email',
        'contact',

    ];
}
