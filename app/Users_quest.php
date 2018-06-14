<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_quest extends Model
{
    public function quest(){
	return $this->belongsTo('App/Quest');
    }
    
    public function user(){
	return $this->belongsTo('App/User');
    }
}
