<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartSite extends Model
{
    protected $fillable = [
        'noTournee',
        'site',
        'finOp',
        'heureDepart',
        'kmDepart',
        'depart_site',
        'destination',
        'observation',
    ];


    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id')->with('vehicules');
    }
}
