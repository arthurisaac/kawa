<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaisseServiceOperatrice extends Model
{
    protected $fillable = [
        'caisseService',
        'operatriceCaisse',
        'numeroOperatriceCaisse',
        'operatriceCaisseBox',
    ];

    public function operatrice()
    {
        return $this->belongsTo('App\Personnel', 'operatriceCaisse', 'id');
    }
}
