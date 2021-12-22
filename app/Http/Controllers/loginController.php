<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    //
    public function check(Request $request) {
        $username = $request->get('username');
        $password = $request->get('password');

        $user = login::check($username, $password);

        if ($user) {
            Session::put('user', $user);
            return \response()->json(['success' =>true, 'url' => route('admin.phanquyen', ['position' => $user->position])]);
        }
        else {
            return \response()->json(['success' => false, 'error' => 'Tài khoản hoặc tên đăng nhập của bạn không chính xác']);
        }
    }
}
