<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class schedule extends Model
{
    use HasFactory;

    public static function addSchedule($nhan_quyen, $start_date, $start_time, $end_date, $end_time) {

        foreach ($nhan_quyen as $nhan_quyen) {

            $result = DB::insert('insert into schedule(nhan_quyen, start_date, start_time, end_date, end_time, status) values(?, ?, ?, ?, ?, ?)', [$nhan_quyen, $start_date, $start_time, $end_date, $end_time, "Open"]);

            if (!$result) {
                return false;
            }

    
        }
        return true;

    }
}
