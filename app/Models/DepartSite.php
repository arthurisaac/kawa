<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartSite extends Model
{
    protected $fillable = [
        'noTournee',
        'numeroSite',
        'site',
        'finOp',
        'heureDepart',
        'kmDepart',
        'bordereau',
        'destination',
        'observation',
        ];


    public function tournees()
    {
        return $this->belongsTo('App\Models\DepartTournee', 'noTournee', 'id');
    }
}
