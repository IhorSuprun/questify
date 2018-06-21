<?php

namespace App\Http\Controllers;

use App\Quest;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class QuestController extends Controller {

    public function allQuests() {
	$quests = Quest::all()->load('author');
	return view('quest.all', [
	    'quests' => $quests,
	]);
    }

    public function quest(User $user, Quest $quest) {
	return view('quest.one', ['quest' => $quest,
	    'user' => $user,
	]);
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
	    $request->user()->quests()->create([
		'title' => $request->title,
		'short_description' => $request->short_description,
		'description' => $request->description,
		'answer' => $request->answer,
		'execution_time' => $request->execution_time,
		'author_id' => $user->id,
		'photo' => $request->photo,
	    ]);

	    return redirect()->route('user.quests', ['user' => $user]);
	} else {
	    return redirect()->route('quest.add', ['user' => $user]);
	}
    }

}
