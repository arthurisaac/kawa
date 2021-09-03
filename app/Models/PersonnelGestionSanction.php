<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelGestionSanction extends Model
{
    protected $fillable = [
        "date",
        "sanction",
        "motif",
        "personnel"
    ];
}
