<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;


class Sujet extends Model
{
    public function documents(){
    	return $this->hasMany(Document::class);
    }
}
