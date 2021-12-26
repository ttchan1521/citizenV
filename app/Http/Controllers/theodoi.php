<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\b1;
use App\Models\b2;

class theodoi extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        if (Session::get('user')->position == "b2") {
            return \redirect()->route('admin.input_citizen');
        }
        else {
            $down = $this->nameDown(Session::get('user')->position);
            $data = $this->getPro();
            $local = $this->getChild();
            $fast = $this->getTenFast();
            $slow = $this->getTenSlow();
            $total = $this->getTotalCtzen();
            $done = $this->getDone();
            return view('aSite.theodoinhaplieu', ['user' => Session::get('user'), 'down' => $down, 'time' => $data[1], 
                        'data' => $data[2], 'fast' => $fast, 'slow' => $slow, 'locals' => $local, 'total' => $total, 'done' => $done]);
        }
    }

    function getChild() {
        $admin = $this->declareAd();
        return $admin->loadLocal();
    }
    public function getPro() {
        $admin = $this->declareAd();
        return $admin->getPro();
    }

    function getTenFast() {
        $admin = $this->declareAd();
        return $admin->getTenFast();
    }

    function getTenSlow() {
        $admin = $this->declareAd();
        return $admin->getTenSlow();
    }

    function getDone() {
        $admin = $this->declareAd();
        return $admin->getTotalPro();
    }

    function getTotalCtzen() {
        $admin = $this->declareAd();
        return $admin->getTotalCtzen();
    }

    function updateChart(Request $request) {
        $id = $request->get('id');

        $admin = $this->declareAd();
        $child = $admin->getChild($id);

        if ($child) {
            $total = $child->getTotalCtzen();
            $done = $child->getTotalPro();
            $data = $child->getPro();
            return \response()->json(['success' => true, 'total' => $total, 'done' => $done, 'id' => $child->id,
                                    'time' => $data[1], 'data' => $data[2]]);
        }

        return \response()->json(['success' => false]);


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
