<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SsbSite extends Model
{
    protected $fillable = [
        'libelle',
        'centre',
        'centreRegional',
        'etrags',
        'banque',
        'filiale',
        'client',
        'site',
        'nomContact',
        'fonctionContact',
        'tel',
        'nombreGab',
        'muros',
        ];
}
