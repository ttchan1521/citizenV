<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;

class dulieu extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        else {
            $down = $this->nameDown(Session::get('user')->position);
            $local = $this->loadLocal();
            return view('aSite.dulieu', ['user' => Session::get('user'), 'down' => $down, 'locals' => $local]);
        }
    }

    function loadLocal() {
        $admin = new amin(Session::get('user')->id, Session::get('user')->name);
        return $admin->loadLocal();
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
