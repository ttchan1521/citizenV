<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class login extends Model
{
    use HasFactory;

    public static function check($username, $password) {

        $password = md5($password);
        $user = DB::select('select id, name, position from admin where id = ? and password = ?', [$username, $password]);

        if (count($user) > 0) {
            return $user[0];
        }
        return false;



    }
}
