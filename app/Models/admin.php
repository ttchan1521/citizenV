<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class admin extends Model
{
    use HasFactory;

    public static function loadLocal($id) {

        $locals = DB::select('select id, name from admin where boss = ?', [$id]);

        if ($locals) {
            $now = Date("Y-m-d");
            foreach($locals as $local) {
                $schedule = DB::select('select start_date, start_time, end_date, end_time, status from schedule where nhan_quyen = ? and end_date > ? limit 1', [$local->id, $now]);
                $local->start_date = "";
                    $local->start_time = "";
                    $local->end_date = "";
                    $local->end_time = "";
                    $local->status = "";

                 
                if (count($schedule) > 0) {
                    $local->start_date = $schedule[0]->start_date;
                    $local->start_time = $schedule[0]->start_time;
                    $local->end_date = $schedule[0]->end_date;
                    $local->end_time = $schedule[0]->end_time;
                    $local->status = $schedule[0]->status;
                }
                
                
            }
        }

        return $locals;
    }

    public static function addLocal($id, $name, $password, $boss, $position) {
        $password = md5($password);
        $local = DB::insert('insert into admin(id, name, password, boss, position) values(?, ?, ?, ?, ?)', [$id, $name, $password, $boss, $position]);

        if ($local) {
            return true;
        }
        return [];
    }

    public static function deleteLocal($id) {
        $result = DB::delete('delete from admin where id = ?', [$id]);

        if ($result) {
            return true;
        }
        return false;
    }
}
