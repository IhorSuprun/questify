<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Quest;
use App\UsersQuest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
	$this->middleware('auth');
    }

    public function index() {
	return 'index';
    }

    public function home() {
	$auth_user = Auth::user();
	$quests = Quest::orderBy('rating', 'desc')->take(5)->get();
	$quests_inprocess = $auth_user->usersquests()->where('status', '=', 0)->get();
	return view('user.main', ['user' => $auth_user,
	    'quests' => $quests,
	    'quests_inprocess' => $quests_inprocess
	]);
    }

    public function profile(User $user) {
	$auth_user = "";
	if (Auth::user()) {
	    $auth_user = Auth::user()->name;
	}
	return view('user.profile', ['user' => $user, 'auth_user' => $auth_user]);
    }

    public function userAllQuests(User $user) {
	$user_quests = $user->quests()->get();
	return view('user.quests', ['user' => $user,
	    'user_quests' => $user_quests
	]);
    }

    public function profileEdit(User $user) {
	if (auth()->user()->can('check', $user)) {
	    return view('user.profile-edit', ['user' => $user]);
	} else {
	    return redirect()->route('user.profile', ['user' => $user->name]);
	}
    }

    public function profileUpdate(User $user, Request $request) {
	if (auth()->user()->can('check', $user)) {
	    $auth_user = Auth::user()->name;
	    $validator = Validator::make($request->all(), [
			'email' => 'required|string|email|max:255|unique:users',
	    ]);

	    if ($validator->fails()) {
		return redirect(route('user.profile-edit', ['user' => $auth_user]))
				->withInput()
				->withErrors($validator);
	    }
	    $user->email = $request->email;
	    $user->save();
	    return redirect('/' . $auth_user . '/profile');
	} else {
	    return redirect()->route('user.profile', ['user' => $user->name]);
	}
    }

    public function inProcess(User $user) {
//	$user = User::where('name', $user_login)->first();
	if (auth()->user()->can('check', $user)) {
	    $quests_inprocess = $user->usersquests()->where('status', '=', 0)->get();
	    return view('user.quests-in-process', ['user' => $user,
		'quests_inprocess' => $quests_inprocess,
		    ]
	    );
	} else {
	    return redirect()->route('user.main');
	}
    }

    public function finished(User $user) {
	if (auth()->user()->can('check', $user)) {
	    $quests_finished = $user->usersquests()->where('status', '=', 1)->get();
	    return view('user.quests-finished', ['user' => $user,
		'quests_finished' => $quests_finished,
		    ]
	    );
	} else {
	    return redirect()->route('user.main');
	}
    }

    public function failed(User $user) {
	if (auth()->user()->can('check', $user)) {
	    $quests_failed = $user->usersquests()->where('status', '=', 2)->get();
	    return view('user.quests-failed', ['user' => $user,
		'quests_failed' => $quests_failed,
		    ]
	    );
	} else {
	    return redirect()->route('user.main');
	}
    }

    public function startQuest(User $user, Quest $quest) {
	$auth_user = Auth::user();
	UsersQuest::create([
	    
	]);
    }

}
