<?php

namespace App\Http\Controllers;

use App\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller {

    public function allQuests() {
        $quests = Quest::all();
        return view('quest.all', [
            'quests' => $quests,
        ]);
    }

    public function questCreate($param) {
        
    }

    public function questUpdate($user_login, Request $request) {
        
    }

}
