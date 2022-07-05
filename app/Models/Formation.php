<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Formation extends Model
{
    protected $fillable = [
        'diplome',
        'specialite',
        'institut',
        'dated',
        'datef',
    ];
}
