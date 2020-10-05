<?php

namespace App\Models;

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
