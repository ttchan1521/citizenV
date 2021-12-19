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

        foreach($locals as $local) {
            $schedule = DB::select('select start, end, status from schedule where nhan_quyen = ? limit 1', [$local->id]);
            if (count($schedule) > 0) {
                $local->start = $schedule[0]->start;
                $local->end = $schedule[0]->end;
                $local->status = $schedule[0]->status;
            }
            else {
                $local->start = "";
                $local->end = "";
                $local->status = "";
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
        return false;
    }
}
