<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public function user(){
	return $this->belongsTo('app/User');
    }
    public function users_quests(){
	return $this-> hasOne('app/Users_quest');
    }
    
    public function getAllQuests(){
	
    }
}
