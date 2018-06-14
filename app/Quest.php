<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    public function user(){
	return $this->belongsTo('App/User');
    }
    public function users_quests(){
	return $this-> hasOne('App/Users_quest');
    }
    
    public function getAllQuests(){
	$quests = App/Quest::all();
	foreach ($quests as $quest){
	    echo $quest->title;
	}
	return $quest;
    }
}
