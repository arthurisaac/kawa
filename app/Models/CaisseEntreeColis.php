<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseEntreeColis extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'centre',
        'centre_regional',
        'agent',
        'chef',
        'observation',
        'totalMontant',
        'totalColis',
    ];

    public function agents()
    {
        return $this->belongsTo('App\Models\Personnel', 'agent', 'id');
    }

    public function chefs()
    {
        return $this->belongsTo('App\Models\Personnel', 'chef', 'id');
    }
}
