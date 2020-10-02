<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchatProduit extends Model
{
    protected $table = 'achat_produit';

    protected $fillable = [
        'date',
        'produit',
        'affectationService',
        'affectationDirection',
        'affectationDirectionGenerale',
        'centre',
        'centreRegional',
        'quantite',
        'montant',
        'montantTTC',
        'montantHT',
        'suiviBudgetaire',
    
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
        return url('/admin/achat-produits/'.$this->getKey());
    }
}
