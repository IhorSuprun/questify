<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller {

    public function index() {
        if (Auth::user()) {
            return redirect()->route('user.main');
        } else {
            return view('pages.index');
        }
    }

}
