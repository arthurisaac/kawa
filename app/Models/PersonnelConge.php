<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelConge extends Model
{
    protected $fillable = [
        'dateDernierDepartConge',
        'dateProchainDepartConge',
        'nombreJourPris',
        'nombreJourRestant',
        'personnel',
    ];
}
