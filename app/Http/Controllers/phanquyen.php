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
            $down = $this->nameDown(Session::get('user')->position);
            return view('aSite.phanquyen', ['user' => Session::get('user'), 'down' => $down, 'local' => $local]);
        }
    }
    public function schedule() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        else {
            $schedule = schedule::loadSchedule(Session::get('user')->id);
            $down = $this->nameDown(Session::get('user')->position);
            return view('aSite.lichkhaibao', ['user' => Session::get('user'), 'down' => $down, 'schedule' => $schedule]);
        }
    }

    function addLocal(Request $request) {

        $this->validate($request,[
            'name' => 'bail|alpha|min:5|max:50',
            'pass' => 'bail|min:8'
        ]);
        $localid = Session::get('user')->id;
        $id = $request->get('id');
        $name = $request->get('name');
        $password = $request->get('password');

        $position = "a2"; 

        if (Session::get('user')->position == "a2")  {
            $position = "a3";
            $this->validate($request,[
                'id' => 'bail|required|digits:4',
            ]);
        } elseif (Session::get('user')->position == "a3") {
            $position = "b1";
            $this->validate($request,[
                'id' => 'bail|required|digits:6',
            ]);
        } elseif (Session::get('user')->position == "b1") {
            $position = "b2";
            $this->validate($request,[
                'id' => 'bail|required|digits:8',
            ]);
        }
        $result = admin::addLocal($id, $name, $password, Session::get('user')->id, $position); 
        
        if ($result) {
            return \response()->json(['success' => true]);
        }
        return \response()->json(['success' => false]);
    }

    function loadHistory(Request $request) {
        $nhan_quyen = $request->get('id');
        $result = schedule::loadHistory($nhan_quyen);

       return \response()->json(['data' => $result]);
        
    } 
    
    function addSchedule(Request $request) {
        $start_date = $request->get('start_date');
        $start_time = $request->get('start_time');
        $end_date = $request->get('end_date');
        $end_time = $request->get('end_time');
        $local = $request->get('local');

        $d1 = new \DateTime($start_date);
        $d2 = new \DateTime('NOW');
        $d3 = new \DateTime($end_date);
        $interval_1 = $d2->diff($d1);
        $interval_2 = $d1->diff($d3);
        if (strtotime($start_date) < strtotime("now")) {
            return \response()->json(['success' => false, 'msg_start_date' => 'Ngày nhập không hợp lệ']);
        }
        if ($interval_1->m > 3) {
            return \response()->json(['success' => false, 'msg_start_date' => 'Thời điểm bắt đầu hơn hiện tại không quá 3 tháng']);
        } 
        if ($interval_2->m > 6)  {
            return \response()->json(['success' => false, 'msg_end_date' => 'Thời điểm kết thúc hơn bắt đầu không quá 6 tháng']);
        } 
        $result =  schedule::addSchedule($local, $start_date, $start_time, $end_date, $end_time);

        if ($result) {
            return \response()->json(['success' => true]);
        }
        return \response()->json(['success' => false]);
    }

    function updateLocal(Request $request) {
        $nhan_quyen = $request->get('id');
        $name = $request->get('name');
        $pass = $request->get('password');
        $start_date = $request->get('start_date');
        $start_time = $request->get('start_time');
        $end_date = $request->get('end_date');
        $end_time = $request->get('end_time');

        $result = schedule::updateLocal($nhan_quyen, $name, $pass, $start_date, $start_time, $end_date, $end_time);

        if ($result) {
            return \response()->json(['success' => true]);
        }
        return \response()->json(['success' => false]);
    }

    function deleteLocal(Request $request) {
        $id = $request->get('id');

        $result = admin::deleteLocal($id);

        if ($result) {
            return \response()->json(['success' => true]);
        }

        return \response()->json(['success' =>false]);
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
