<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseSortieColis extends Model
{
    protected $fillable = [
        'date',
        'heure',
        'agentRegulation',
        'observation',
    ];

    public function agentRegulations()
    {
        return $this->belongsTo('App\Models\Personnel', 'agentRegulation', 'id');
    }
}
