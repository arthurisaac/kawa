<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteDepartTournee extends Model
{
    protected $fillable = [
        'site', 'heure', 'type', 'idTourneeDepart'
    ];
}
