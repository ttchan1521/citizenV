<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class theodoi extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        else {
            return view('aSite/a1.theodoinhaplieu', ['user' => Session::get('user')]);
        }
    }
}
