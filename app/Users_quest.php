<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_quest extends Model
{
    public function quest(){
	return $this->belongsTo('app/Quest');
    }
    
    public function user(){
	return $this->belongsTo('app/User');
    }
}
