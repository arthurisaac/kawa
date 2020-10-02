<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComptabiliteSortieCaisse extends Model
{

    protected $fillable = [
        'date',
        'somme',
        'motif',
        'beneficiaire',
        'service'
    ];
}
