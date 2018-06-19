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

    public function profile($user_login) {
        $user = User::where('name', $user_login)->first();
        $auth_user = "";
        if (Auth::user()) {
            $auth_user = Auth::user()->name;
        }
        return view('user.profile', ['user' => $user, 'auth_user' => $auth_user]);
    }

    public function home() {
        $auth_user = Auth::user();
        $quests = Quest::orderBy('rating', 'desc')->take(5)->get();
        $quests_inprocess = $auth_user->usersquests()->where('status', '=', 0)->get();
        return view('user.main', ['auth_user' => $auth_user,
            'quests' => $quests,
            'quests_inprocess' => $quests_inprocess
        ]);
    }

    public function userAllQuests($user_login) {
        $user = User::where('name', $user_login)->first();
        $user_quests = $user->quests()->get();
        return view('user.quests', ['user' => $user,
            'user_quests' => $user_quests
        ]);
    }

    /**
     * 
     * @param string $user_login
     * @return view
     * Описание: Выводит форму для изменения данных пользователя
     */
    public function profileEdit($user_login) {
        $auth_user = Auth::user();
        if ($user_login !== $auth_user) {
            redirect('/{user_login}/profile');
        }
        return view('user.profile-edit', ['user' => $auth_user]);
    }

    /**
     * 
     * @param User $user
     * @param Request $request
     * @return redirect
     * Описание: Обновляет данные о профиле пользователя в БД
     */
    public function profileUpdate(User $user, Request $request) {
        //TODO придумать валидацию!
        $this->validate($request, [
            'email' => 'required|max:255',
        ]);
        $this->validate($request, [
            'photo' => 'required|max:255',
        ]);
        $request->user()->update([
            'email' => $request->email,
            'photo' => $request->photo,
        ]);
        return redirect($user->name . '/profile');
        //TODO доделать!
    }

    /**
     * 
     * @param string $user_login
     * @return type
     * 
     */
    public function inProcess($user_login) {
        //TODO сделать адекватную проверку!!!
        $auth_user = Auth::user();
        if ($user_login !== $auth_user->name) {
            redirect('/' . $auth_user->name);
        }
        $quests_inprocess = $auth_user->usersquests()->where('status', '=', 0)->get();
        return view('user.quests-in-process', ['user' => $auth_user,
            'quests_inprocess' => $quests_inprocess,
                ]
        );
    }

    /**
     * 
     * @param string $user_login
     * @return type
     */
    public function finished($user_login) {
        //TODO сделать адекватную проверку!!!
        $auth_user = Auth::user();
        if ($user_login !== $auth_user->name) {
            redirect('/' . $auth_user->name);
        }
        $quests_finished = $auth_user->usersquests()->where('status', '=', 1)->get();
        return view('user.quests-finished', ['user' => $auth_user,
            'quests_finished' => $quests_finished,
                ]
        );
    }

    /**
     * 
     * @param string $user_login
     * @return type
     */
    public function failed($user_login) {
        //TODO сделать адекватную проверку!!!
        $auth_user = Auth::user();
        if ($user_login !== $auth_user->name) {
            redirect('/' . $auth_user->name);
        }
        $quests_failed = $auth_user->usersquests()->where('status', '=', 2)->get();
        return view('user.quests-failed', ['user' => $auth_user,
            'quests_failed' => $quests_failed,
                ]
        );
    }

    public function allQuests($user_login) {
        //Выводим список всех квестов
    }

    public function getQuest($user_login, $quest_title) {
        //Полное описание квеста
    }

}
