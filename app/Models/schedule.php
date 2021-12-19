<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    public static function addSchedule($nhan_quyen, $start, $end) {
        $result = DB::insert('insert into schedule(nhan_quyen, start, end) values(?, ?, ?)', [$nhan_quyen, $start, $end]);

        if ($result) {
            return true;
        }
        return false;
    }
}
