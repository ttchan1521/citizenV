<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\b1;

class input_citizen extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        else {
            $down = $this->nameDown(Session::get('user')->position);
            $citizen = $this->getCitizen();
            return view('aSite.input_citizen', ['user' => Session::get('user'), 'down' => $down, 'citizen' => $citizen]);
        }
    }

    function getCitizen() {
        $admin = new b1(Session::get('user')->id, Session::get('user')->name);
        $result = $admin->getCitizen(Session::get('user')->id);

        return $result;
    }

    function getOne(Request $request) {
        $admin = new b1(Session::get('user')->id, Session::get('user')->name);

        $id = $request->get('id');

        $result = $admin->getOne($id);

        return \response()->json(['data' => $result[0]]);
    }

    function test(Request $request) {
        $fullname = $request->get('fullname');
        $birthdate = $request->get('birthdate');
        $gender = $request->get('gender');

        $admin = new b1(Session::get('user')->id, Session::get('user')->name);

        $result = $admin->test($fullname, $birthdate, $gender);

        if ($result) {

            return \response()->json(['data' => $result[0]]);
        }
        return \response()->json(['data' => false]);
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
