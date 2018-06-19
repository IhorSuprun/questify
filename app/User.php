<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quests() {
        return $this->hasMany(Quest::class, 'author_id');
    }
    public function usersquests(){
	return $this->belongsToMany(Quest::class, 'users_quests', 'user_id', 'quest_id');
    }
    public function getRouteKeyName() {
	return 'name';
    }
}
