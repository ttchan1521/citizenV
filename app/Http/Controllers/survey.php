<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class survey extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        if (Session::get('user')->position != "b1" ) {
            return \redirect()->route('admin.phanquyen');
        }
        else {
            $down = $this->nameDown(Session::get('user')->position);
            return view('aSite.survey', ['user' => Session::get('user'), 'down' => $down]);
        }
    }

    function nameDown($position) {
        if ($position == "a1") {
            return "tỉnh/thành phố";
        }
        elseif ($position == "a2") {
            return "quận/huyện";
        }
        elseif ($position == "a3") {
            return "xã/phường";
        }
        return "thôn/bản";
    }
}
