<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\admin;

class b1 extends admin
{
    use HasFactory;

    function getCitizen() {
        $result = DB::select('select * from citizen where hamlet = ?', [$this->id]);

        return $result;
    }

    function test($fullname, $birthdate, $gender) {
        $result = DB::select('select * from citizen where hamlet = ? and fullname = ? and birthdate = ? and gender = ?', [$this->id, $fullname, $birthdate, $gender]);

        return $result;

    }

    function getOne($id) {
        $result = DB::select('select * from citizen where hamlet = ? and citizen_id = ?', [$this->id, $id]);

        return $result;
    }

}
