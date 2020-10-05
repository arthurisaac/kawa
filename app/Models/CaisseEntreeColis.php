<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseEntreeColis extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'agentRegulation',
        'observation',
    ];

    public function agentRegulations()
    {
        return $this->belongsTo('App\Personnel', 'agentRegulation', 'id');
    }
}
