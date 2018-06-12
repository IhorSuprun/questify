<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
	$this->middleware("auth");
    }
    private function authUserName() {
	$auth_user = "";
        if(Auth::user()) {
            $auth_user = Auth::user()->name;
        }
	return $auth_user;
    }
    
    public function index() {
        return 'index';
    }
    public function profile($user_login) {
        $user = User::where('name', $user_login)->first();
	$auth_user=authUserName();
        return view('user.profile', ['user' => $user, 'auth_user' => $auth_user]);
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
