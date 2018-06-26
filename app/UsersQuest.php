<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UsersQuest extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'quest_id', 'status', 'time_start', 'time_end'
    ];

    public function getcurrenttime() {
        date_default_timezone_set('Europe/Kiev');
        return date('Y:m:d H:i:s', Carbon::now()->timestamp);
    }

}
