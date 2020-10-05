<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteDepartTournee extends Model
{
    protected $fillable = [
        'site', 'heure', 'type', 'idTourneeDepart'
    ];
}
