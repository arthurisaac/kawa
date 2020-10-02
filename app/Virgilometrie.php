<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Virgilometrie extends Model
{
    protected $table = 'virgilometrie';

    protected $fillable = [
        'date',
        'nomPrenoms',
        'heureArrivee',
        'typePiece',
        'personneVisitee',
        'motif',
        'heureDepart',
        'observation',
        'photo',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'date',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/virgilometries/'.$this->getKey());
    }
}
