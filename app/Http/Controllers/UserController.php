<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Quest;
use App\UsersQuest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    private function authUserName() {
        $auth_user = "";
        if (Auth::user()) {
            $auth_user = Auth::user()->name;
        }
        return $auth_user;
    }

    public function index() {
        return 'index';
    }

    public function profile($user_login) {
        $user = User::where('name', $user_login)->first();
        $auth_user = "";
        if (Auth::user()) {
            $auth_user = Auth::user()->name;
        }
        return view('user.profile', ['user' => $user, 'auth_user' => $auth_user]);
    }

    public function home() {
        $auth_user = "";
        if (Auth::user()) {
            $auth_user = Auth::user()->name;
        }
        $user = User::where('name', $auth_user)->first();
        $quests = Quest::orderBy('rating', 'desc')->take(5)->get();
        $quests_inprocess = UsersQuest::where('user_id', '=', $user->id)->take(3)->get();
        return view('user.main', ['auth_user' => $auth_user,
            'quests' => $quests,
            'quests_inprocess' => $quests_inprocess
        ]);
    }

    public function userAllQuests($user_login) {
        $user = User::where('name', $user_login)->first();
        //$user_quests = $user->quests()->get();
        $user_quests = Quest::orderBy('rating', 'desc')->where('author_id', '=', $user->id)->get();
        $auth_user = "";
        if (Auth::user()) {
            $auth_user = Auth::user()->name;
        }
        return view('user.quests', ['auth_user' => $auth_user,
            'user' => $user,
            'user_quests' => $user_quests
        ]);
    }

    public function profileEdit($user_login) {
        //Показать вид для редактирования профиля
    }

    public function profileUpdate($user_login, Request $request) {
        //Принять данные с формы, сделать валидацию и сохранить в базу
    }

    public function allQuests($user_login) {
        //Выводим список всех квестов
    }

    public function getQuest($user_login, $quest_title) {
        //Полное описание квеста
    }

}
