<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionInformatiqueLibelle extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'categorie_id', 'location'];

    public function categorie()
    {
        return $this->belongsTo('App\Models\OptionInformatiqueCategorie', 'categorie_id', 'id');
    }
}
