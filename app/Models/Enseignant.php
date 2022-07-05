<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Enseignant extends Model
{
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
