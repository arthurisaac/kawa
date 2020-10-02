<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformatiqueFournisseur extends Model
{
    protected $table = 'informatique_fournisseur';

    protected $fillable = [
        'libelleFournisseur',
        'specialite',
        'localisation',
        'nationalite',
        'email',
        'contact',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/informatique-fournisseurs/'.$this->getKey());
    }
}
