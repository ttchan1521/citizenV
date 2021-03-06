<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class schedule extends Model
{
    use HasFactory;

    public $sche_id;
    public $start_date;
    public $start_time;
    public $end_date;
    public $end_time;
    public $status;

    public static function addSchedule($nhan_quyen, $start_date, $start_time, $end_date, $end_time) {

        foreach ($nhan_quyen as $nhan_quyen) {

            $result = DB::insert('insert into schedule(nhan_quyen, start_date, start_time, end_date, end_time, status) values(?, ?, ?, ?, ?, ?)', [$nhan_quyen, $start_date, $start_time, $end_date, $end_time, "Open"]);

            if (!$result) {
                return false;
            }

    
        }
        return true;

    }

    public static function loadSchedule($nhan_quyen) {
        $result = DB::select('select * from schedule where nhan_quyen = ?', [$nhan_quyen]);

        if ($result) {
            return $result;
        }

        return [];
    }

    public static function loadHistory($nhan_quyen) {
        $now = Date("Y-m-d");
        $result = DB::select('select * from schedule where nhan_quyen = ? and end_date < ?', [$nhan_quyen, $now]);

        if ($result) {
            return $result;
        }
        return false;
    }

    public static function complete($nhan_quyen) {
        $result = DB::update('update schedule set status = "Done" where nhan_quyen = ? and status = "Open"', [$nhan_quyen]);

        if($result) {
            return true;
        }
        return false;
    }
    public static function updateLocal($nhan_quyen, $name, $password, $start_date, $start_time, $end_date, $end_time) {
        try {
            $result1 = DB::update('update admin set name = ? where id = ?', [$name, $nhan_quyen]);

        } catch(\Illuminate\Database\QueryException $ex ) {
            return false;
        }
        
        
        


            
        if ($password) {
            $password = md5($password);

            try {
                $result2 = DB::update('update admin set password = ? where id = ?', [$password, $nhan_quyen]);
            } catch (\Illuminate\Database\QueryException $ex) {
                return false;
            }
        }

    
        if ($end_date) {

        $id = DB::select('select sche_id from schedule where nhan_quyen = ? limit 1', [$nhan_quyen]);

        
        if ($id) {
            $id = $id[0]->sche_id;

            try {
                $result3 = DB::update('update schedule set start_date = ?, start_time = ?, end_date = ?, end_time = ? where sche_id = ?', [$start_date, $start_time, $end_date, $end_time, $id]);
            } catch (\Illuminate\Database\QueryException $ex) {
                return false;
            }

        } 
        else {

            try {
                $result4 = DB::insert('insert into schedule(nhan_quyen, start_date, start_time, end_date, end_time, status) values(?, ?, ?, ?, ?, ?)', [$nhan_quyen, $start_date, $start_time, $end_date, $end_time, "Open"]);
            } catch (\Illuminate\Database\QueryException $ex) {
                return false;
            }

            
        }
    }

    

        return true;

        
    }
}
