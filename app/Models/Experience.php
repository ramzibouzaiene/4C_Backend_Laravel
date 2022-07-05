<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Experience extends Model
{
	 protected $fillable = [
        'titre',
        'entreprise',
        'localisation',
        'datedebut',
        'datefin',
        'description',

    ];

    
}
