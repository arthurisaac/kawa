<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteArriveeTournee extends Model
{
    protected $fillable = [
        'site',
        'bord',
        'montant',
        'idTourneeArrivee',
    ];
}
