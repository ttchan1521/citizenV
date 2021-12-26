<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\b1;
use App\Models\b2;

class phantich extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        else {
            $name = Session::get('user')->name;
            $down = $this->nameDown(Session::get('user')->position);
            $data = $this->quanEachYear();
            $sinh = $this->sinhEachYear();
            $tu = $this->tuEachYear();
            return view('aSite.bieudophantich', ['user' => Session::get('user'),'name'=>$name, 'down' =>$down, 'year' => $data[0], 'data' => $data[1], 
                        'sinh' => $sinh[1], 'tu' => $tu[1]]);
        }
    }

    function quanEachYear() {
        $admin = $this->declareAd();

        return $admin->quanEachYear();
    }

    function sinhEachYear() {
        $admin = $this->declareAd();

        return $admin->sinhEachYear();
    }

    function tuEachYear() {
        $admin = $this->declareAd();
        return $admin->tuEachYear();
    }

    function declareAd() {
        $admin = new admin(Session::get('user')->id, Session::get('user')->name);
        if (Session::get('user')->position == "b1") {
            $admin = new b1(Session::get('user')->id, Session::get('user')->name);
        }
        if (Session::get('user')->position == "b2") {
            $admin = new b2(Session::get('user')->id, Session::get('user')->name);
        }

        return $admin;
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
