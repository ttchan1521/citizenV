<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\b1;
use App\Models\b2;

class input_citizen extends Controller
{
    //
    public function index() {
        if (!(Session::has('user'))) {
            return redirect()->route('login');
        }
        if (Session::get('user')->position != "b1" && Session::get('user')->position != "b2") {
            return \redirect()->route('admin.phanquyen');
        }
        else {
            $down = $this->nameDown(Session::get('user')->position);
            $citizen = $this->getCitizen();
            return view('aSite.input_citizen', ['user' => Session::get('user'), 'down' => $down, 'citizen' => $citizen]);
        }
    }

    function getModel() {
        if (Session::get('user')->position == "b1") {
            return new b1(Session::get('user')->id, Session::get('user')->name);
        }
        return new b2(Session::get('user')->id, Session::get('user')->name);
    }

    function getCitizen() {
        $admin = $this->getModel();
        $result = $admin->getCitizen(Session::get('user')->id);

        return $result;
    }

    function getOne(Request $request) {
        $admin = $this->getModel();

        $id = $request->get('id');

        $result = $admin->getOne($id);

        return \response()->json(['data' => $result[0]]);
    }

    function test(Request $request) {
        $fullname = $request->get('fullname');
        $birthdate = $request->get('birthdate');
        $gender = $request->get('gender');

        $admin = $this->getModel();

        $result = $admin->test($fullname, $birthdate, $gender);

        if ($result) {

            return \response()->json(['data' => $result[0]]);
        }
        return \response()->json(['data' => false]);
    }


    function declare(Request $request) {
        $id = $request->get('id');
        $fullname = $request->get('fullname');
        $birthdate = $request->get('birthdate');
        $gender = $request->get('gender');
        $hometown = $request->get('hometown');
        $address = $request->get('address');
        $temporary_add = $request->get('temporary_add');
        $identity_num = $request->get('identity_num');
        $ton_giao = $request->get('ton_giao');
        $education_level = $request->get('level');
        $job = $request->get('job');

        $admin = $this->getModel();

        $result = false;

        if(!$fullname || \strlen($fullname) < 5 || \strlen($fullname) > 50) {
            return \response()->json(['success' => false, 'error' => 'Tên của bạn không hợp lệ']);
        }
        
        if (!$birthdate) {
            return \response()->json(['success' => false, 'error' => 'Vui lòng nhập vào trường này']);
            $now = new \DateTime('NOW');
            $birth = new \DateTime($birthdate);
            if ($birth > $now) {
                return \response()->json(['success' => false, 'error' => 'Ngày sinh không hợp lệ']);
            }   
        }

        if (!$gender) {
            return \response()->json(['success' => false, 'error' => 'Vui lòng nhập vào trường này']);
            if ($gender != 1 && $gender != 2) {
                return \response()->json(['success' => false, 'error' => 'Giới tính không hợp lệ']);
            }
        }

        if (!$hometown || !$address || !$ton_giao) {
            return \response()->json(['success' => false, 'error' => 'Vui lòng nhập vào trường này']);
        }

        if (!$education_level) {
            return \response()->json(['success' => false, 'error' => 'Vui lòng nhập vào trường này']);
            if ($education_level < 1 || $education_level > 6) {
                return \response()->json(['success' => false, 'error' => 'Trình độ văn hóa không hợp lệ']);
            }
        }

        if (!$job) {
            return \response()->json(['success' => false, 'error' => 'Vui lòng nhập vào trường này']);
            if ($job < 1 && $job > 11) {
                return \response()->json(['success' => false, 'error' => 'Nghề nghiệp không hợp lệ']);
            }
        }

        if ($id == "false") {
            $result = $admin->addCitizen($fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job);
        }
        else {
            $result = $admin->updateCitizen($id, $fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job);
        }
        

        if ($result) {
            return \response()->json(['success' => true]);
        }

        return \response()->json(['success' => false]);
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
