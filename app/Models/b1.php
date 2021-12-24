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

    function addCitizen($fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job) {
        $result = DB::insert('insert into citizen(fullname, birthdate, gender, hometown, address, hamlet, temporary_add, identity_num, ton_giao, education_level, job) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                            [$fullname, $birthdate, $gender, $hometown, $address, $this->id, $temporary_add, $identity_num, $ton_giao, $education_level, $job]);
        
        if ($result) {
            return true;
        }
        return false;
    }

    function updateCitizen($id, $fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job) {
        $result = DB::update('update citizen set fullname = ?, birthdate = ?, gender = ?, hometown = ?, address = ?, temporary_add = ?, identity_num = ?, ton_giao = ?, education_level = ?, job = ? where citizen_id = ?', 
                            [$fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job, $id]);
        
        if ($result) {
            return true;
        }
        return false;
    }
}
