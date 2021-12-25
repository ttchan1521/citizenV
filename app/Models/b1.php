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
        $result = DB::insert('insert into citizen(fullname, birthdate, gender, hometown, address, hamlet, temporary_add, identity_num, ton_giao, education_level, job, update_by) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                            [$fullname, $birthdate, $gender, $hometown, $address, $this->id, $temporary_add, $identity_num, $ton_giao, $education_level, $job, $this->id]);
        
        if ($result) {
            return true;
        }
        return false;
    }

    function updateCitizen($id, $fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job) {
        $result = DB::update('update citizen set fullname = ?, birthdate = ?, gender = ?, hometown = ?, address = ?, temporary_add = ?, identity_num = ?, ton_giao = ?, education_level = ?, job = ?, update_by = ? where citizen_id = ?', 
                            [$fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job, $this->id, $id]);
        
        if ($result) {
            return true;
        }
        return false;
    }

    function progress($time) {
        $begin = date("Y-m-d H:i:s", strtotime($time));
        $end = date('Y-m-d H:i:s', strtotime($time. ' + 1 days'));
        $result = DB::select('select count(*) as total from citizen where update_at < ? and update_at >= ? and hamlet = ?', [$end, $begin, $this->id]);

        return $result[0]->total;
    }

    function getTotalCtzen() {
        $result = DB::select('select count(*) as total from citizen where hamlet = ?', [$this->id]);
        return $result[0]->total;
    }

    function getFemale($year) {
        $result = DB::select('select quantity from gender_detail 
                            inner join schedule on gender_detail.schedule = schedule.sche_id
                            where gender = 1 and extract(year from start_date) = ? and nhan_quyen =?', [$year, $this->id]);
        if ($result) {
            return $result[0]->quantity;
        }
    }

    function getMale($year) {
        $result = DB::select('select quantity from gender_detail 
                            inner join schedule on gender_detail.schedule = schedule.sche_id
                            where gender = 2 and extract(year from start_date) = ? and nhan_quyen =?', [$year, $this->id]);
        if ($result) {
            return $result[0]->quantity;
        }
    }

    function getSinh($year) {
        $result = DB::select('select sinh from schedule where extract(year from start_date) = ? and nhan_quyen =?', [$year, $this->id]);

        if ($result) {
            return $result[0]->sinh;
        }
    }

    function getTu($year) {
        $result = DB::select('select tu from schedule where extract(year from start_date) = ? and nhan_quyen =?', [$year, $this->id]);

        if ($result) {
            return $result[0]->tu;
        }
    }
}
