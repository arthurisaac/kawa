<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteDepartTournee extends Model
{
    protected $fillable = [
        'site', 'heure', 'tdf', 'idTourneeDepart', 'caisse', 'montant'
    ];

    public function sites()
    {
        return $this->belongsTo('App\Models\Commercial_site', 'site', 'id');
    }

    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'idTourneeDepart', 'id');
    }
}
