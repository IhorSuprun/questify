<?php

namespace App\Http\Controllers;
use App\Quest;
use App\Users_quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function allQuests(){
	$quests = Quest::orderBy('created_at', 'desc')
               ->get();
	return view('quest.all',['quests'=>$quests]);
    }
}
