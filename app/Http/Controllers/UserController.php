<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Quest;
use App\UsersQuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

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
                        'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect(route('user.profile-edit', ['user' => $auth_user]))
                                ->withInput()
                                ->withErrors($validator);
            }
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/' . $auth_user . '/profile');
        } else {
            return redirect()->route('user.profile', ['user' => $user->name]);
        }
    }

    //ТОДО вызвать метод
    public function userPhotoUpdate(User $user, Request $request) {
        if (auth()->user()->can('check', $user)) {
            $validator = Validator::make($request->all(), [
                        'photo' => 'image|dimensions:max_width=1200,max_height=1200',
            ]);
            if ($validator->fails()) {
                return redirect()->route('user.profile', ['user' => $user->name])
                                ->withInput()
                                ->withErrors($validator);
            }
            $path = $request->photo->store('photos', 'public');
            $user->photo = $path;
            $user->save();

            return redirect()->route('user.quests', ['user' => $user]);
        } else {
            return redirect()->route('quest.add', ['user' => $user]);
        }
    }

    public function inProcess(User $user) {
//	$user = User::where('name', $user_login)->first();
        if (auth()->user()->can('check', $user)) {
            $quests_inprocess = $user->usersquests()->where('status', '=', 0)->withPivot('time_end')->get();
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
        if (Auth::user() === $user->name) {
            return redirect()->route('quests.all');
        } else {
            $auth_user = Auth::user();
            date_default_timezone_set('Europe/Kiev');
            $time_end = date('Y:m:d H:i:s', Carbon::now()->addHours($quest->execution_time)->timestamp);
//        return dd($time_end);
            UsersQuest::create([
                'user_id' => $auth_user->id,
                'quest_id' => $quest->id,
                'time_end' => $time_end,
            ]);
            return redirect()->route('user.questsinprocess', [
                        'user' => $user,
            ]);
        }
    }

    public function finishQuest(User $user, Quest $quest, Request $request) {
        if (Auth::user() === $user->name) {
            return redirect()->route('user.questsinprocess', ['user' => Auth::user(),
            ]);
        } else {
            $user_quest = UsersQuest::where('quest_id', '=', $quest->id)->where('status', '=', 0)->where('user_id', '=', Auth::user()->id)->first();
            date_default_timezone_set('Europe/Kiev');
            $current_time = date('Y:m:d H:i:s', Carbon::now()->timestamp);
            if (strtotime($current_time) > strtotime($user_quest->time_end)) {
                $result = 'timeend';
                $user_quest->status = 2;
                $user_quest->save();
            } else {
                $validator = Validator::make($request->all(), [
                            'answer' => 'required|string',
                ]);

                if ($validator->fails()) {
                    return redirect(route('quest.one', ['user' => $user,
                                        'quest' => $quest])
                                    )
                                    ->withInput()
                                    ->withErrors($validator);
                }

                if ($quest->answer === $request->answer) {

                    $result = 'success';
                    $user_quest->status = 1;
                    $user_quest->time_end = $current_time;
                    $user_quest->save();
                } else {
                    $result = 'fail';
                    $user_quest->status = 2;
                    $user_quest->save();
                }
                return view('user.quests-complete', [
                    'result' => $result,
                ]);
            }
        }
    }

}
