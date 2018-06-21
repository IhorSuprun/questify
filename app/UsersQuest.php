<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersQuest extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	'user_id', 'quest_id', 'status', 'time_start', 'time_end'
    ];

}
