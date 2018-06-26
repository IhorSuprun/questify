<?php

namespace App\Http\Controllers;

use App\Quest;
use App\User;
use App\UsersQuest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller {

    public function allQuests() {
        $quests = Quest::all()->load('author');
        return view('quest.all', [
            'quests' => $quests,
        ]);
    }

    public function quest(User $user, Quest $quest) {
        //проверка на соответсвие автора и квеста
        if ($user->id === $quest->author_id) {
            $is_active = UsersQuest::where('quest_id', '=', $quest->id)->where('status', '=', 0)->get();
            $current_active = UsersQuest::where('quest_id', '=', $quest->id)->where('user_id', '=', Auth::user()->id)->first();
//            dd($current_active);
            return view('quest.one', ['quest' => $quest,
                'user' => $user,
                'is_active' => $is_active,
                'current_active' => $current_active,
            ]);
        } else {
            return abort(404);
        }
    }

    public function questAdd(User $user) {
        return view('quest.add', ['user' => $user]);
    }

    public function questCreate(User $user, Request $request) {
        if (auth()->user()->can('check', $user)) {
            $validator = Validator::make($request->all(), [
                        'title' => 'required|string|max:255|unique:quests',
                        'short_description' => 'required|string',
                        'description' => 'required|string',
                        'answer' => 'required|string|max:255',
                        'photo' => 'image|dimensions:max_width=1200,max_height=1200',
            ]);
            if ($validator->fails()) {
                return redirect(route('quest.add', ['user' => $user]))
                                ->withInput()
                                ->withErrors($validator);
            }
            $path = $request->photo->store('photos/quests', 'public');
            $request->user()->quests()->create([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'answer' => $request->answer,
                'execution_time' => $request->execution_time,
                'author_id' => $user->id,
                'photo' => $path,
            ]);

            return redirect()->route('user.quests', ['user' => $user]);
        } else {
            return redirect()->route('quest.add', ['user' => $user]);
        }
    }

    public function editQuest(User $user, Quest $quest) {
        return view('quest.edit', [
            'quest' => $quest,
            'user' => $user,
        ]);
    }

    public function updateQuest(User $user, Quest $quest, Request $request) {
        if (auth()->user()->can('check', $user)) {
            $validator = Validator::make($request->all(), [
                        'title' => 'required|string|max:255|unique:quests',
                        'short_description' => 'required|string',
                        'description' => 'required|string',
                        'answer' => 'required|string|max:255',
                        'photo' => 'image|dimensions:max_width=1200,max_height=1200',
            ]);
            if ($validator->fails()) {
                return redirect(route('quest.add', ['user' => $user]))
                                ->withInput()
                                ->withErrors($validator);
            }
            $path = $request->photo->store('photos/quests', 'public');
            $quest()->save([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'answer' => $request->answer,
                'execution_time' => $request->execution_time,
                'photo' => $path,
            ]);
            return redirect()->route('user.quests', ['user' => $user]);
        } else {
            return redirect()->route('quest.edit', ['user' => $user]);
        }
    }

    public function deleteQuest(User $user, Quest $quest) {
        if ($user->id === $quest->author_id) {
            $quest->delete();
            return redirect()->route('user.quests', ['user' => $user]);
        } else {
            return abort(404);
        }
    }

}
