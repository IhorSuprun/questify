<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
	//
    }

    public function check(User $auth_user, User $current_user) {
	return $auth_user->id === $current_user->id;
    }

}
