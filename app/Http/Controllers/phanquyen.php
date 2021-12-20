<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin;
use App\Models\schedule;

class phanquyen extends Controller
{
    //

    function load($id) {

        return admin::loadLocal($id);
    }


    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        else {
            $local = $this->load(Session::get('user')->id);
            return view('aSite.phanquyen', ['user' => Session::get('user'), 'local' => $local]);
        }
    }
    public function schedule() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        else {
            $local = $this->load(Session::get('user')->id);
            return view('aSite.lichkhaibao', ['user' => Session::get('user'), 'local' => $local]);
        }
    }

    function addLocal(Request $request) {
        $id = $request->get('id');
        $name = $request->get('name');
        $password = $request->get('password');

        $position = "a2";

        if (Session::get('user')->position == "a2")  {
            $position = "a3";
        } elseif (Session::get('user')->position == "a3") {
            $position = "b1";
        } elseif (Session::get('user')->position == "b1") {
            $position = "b2";
        }

        $result = admin::addLocal($id, $name, $password, Session::get('user')->id, $position);

        if ($result) {
            return \response()->json(['success' => true]);
        }
        return \response()->json(['success' => false]);
    }
    
    function addSchedule(Request $request) {
        $start_date = $request->get('start_date');
        $start_time = $request->get('start_time');
        $end_date = $request->get('end_date');
        $end_time = $request->get('end_time');
        $local = $request->get('local');

        $result =  schedule::addSchedule($local, $start_date, $start_time, $end_date, $end_time);

        if ($result) {
            return \response()->json(['success' => true]);
        }
        return \response()->json(['success' => false]);
    }
}
