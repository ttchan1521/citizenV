<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\citizen;

class dulieu extends Controller
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
            $name = Session::get('user')->name;
            $position = Session::get('user')->position;
            $down = $this->nameDown(Session::get('user')->position);
            $local = $this->loadLocal();
            $citizen = $this->loadCitizen();
            return view('aSite.dulieu', ['user' => Session::get('user'),'position' => $position, 'down' => $down, 'locals' => $local, 'citizen' => $citizen, 'name' => $name]);
        }
    }
    function loadCitizen() {
        $admin = new admin (Session::get('user')->id, Session::get('user')->name);
        return $admin->loadCitizen();
    }
    function loadLocal() {
        $admin = new admin(Session::get('user')->id, Session::get('user')->name);
        return $admin->loadLocal();
    } 
    function load_InfoCitizen(Request $request) {
        $id = $request->get('id');
        $result = citizen::load_info_Citizen($id);
        return \response()->json(['data' => $result]);
        
    } 

    // function totalPopula(Request $request) {
    //     $id = $request->get('id');
    //     $result = citizen::totalPopulation($id);
    //     return \response()->json(['data' => $result]);
    // }

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
