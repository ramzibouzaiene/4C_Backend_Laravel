<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Partenaire;



class Partnertype extends Model
{
    public function partners(){
    	return $this->hasMany(Partenaire::class);
    }
}
