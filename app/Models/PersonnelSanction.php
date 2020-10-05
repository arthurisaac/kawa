<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelSanction extends Model
{
    protected $fillable = [
        'personnel',
        'avertissement',
        'miseAPied',
        'licenciement',
    ];
}
