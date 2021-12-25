<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class admin extends Model
{
    use HasFactory;

    public $id;
    public $name;
    protected $child = array();
    protected $allCitizen = array();

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
        $locals = DB::select('select id, name from admin where boss = ?', [$id]);
        if ($locals) {
            foreach($locals as $local) {
                $smallAdd = new admin($local->id, $local->name);
                $this->child[] = $smallAdd;
            }
        }
        
        
        

        $citizen = DB::select('select C.citizen_id, C.hamlet, C.fullname,  thon_table.name as Thon, 
        xa_table.name as Xa, 
        huyen_table.name as Huyen, 
        tinh_table.name as Tinh
        FROM citizen C,
        (SELECT id, name FROM admin WHERE CHAR_LENGTH(id) = 8) thon_table,
        (SELECT id, name FROM admin WHERE CHAR_LENGTH(id) = 6) xa_table,
        (SELECT id, name FROM admin WHERE CHAR_LENGTH(id) = 4) huyen_table,
        (SELECT id, name FROM admin WHERE CHAR_LENGTH(id) = 2) tinh_table
        WHERE SUBSTRING(C.hamlet, 1, 8) = thon_table.id
        AND SUBSTRING(C.hamlet, 1, 6) = xa_table.id
        AND SUBSTRING(C.hamlet, 1, 4) = huyen_table.id
        AND SUBSTRING(C.hamlet, 1, 2) = tinh_table.id
        AND C.hamlet like ?',["$id%"]);
        if ($citizen) {
            foreach($citizen as $each){
                $this->allCitizen[] = $each;
            }
        }
        
    }

    function loadLocal() {
        return $this->child;
    }
    function loadCitizen() { 
        return $this->allCitizen;
    }

    public function loadSchedule() {
        $temps = $this->child;

        
        $now = Date("Y-m-d");
        foreach($temps as $temp) {
            $schedule = DB::select('select start_date, start_time, end_date, end_time, status from schedule where nhan_quyen = ? and end_date > ? limit 1', [$temp->id, $now]);
                    $temp->start_date = "";
                    $temp->start_time = "";
                    $temp->end_date = "";
                    $temp->end_time = "";
                    $temp->status = "";

                 
                if (count($schedule) > 0) {
                    $temp->start_date = $schedule[0]->start_date;
                    $temp->start_time = $schedule[0]->start_time;
                    $temp->end_date = $schedule[0]->end_date;
                    $temp->end_time = $schedule[0]->end_time;
                    $temp->status = $schedule[0]->status;
                }
        }
        

        return $temps;
    }


    public function uncomplete() {
        $temps = $this->loadSchedule();

        foreach($temps as $key => $element) {
            if ($element->status != "Open") {
                unset($temps[$key]);
            }
        }

        return $temps;
    }
    

    public function closeOne($smallId) {
        $result = DB::update('update schedule set status = "Close" where nhan_quyen = ? and status = "Open" ', [$smallId]);
        $temp = $this->getChild($smallId);
        if ($temp) {
            $temp->closeAll();
        }
    }   

    public function closeAll() {
        $temps = $this->child;

        foreach($temps as $temp) {
            $this->closeOne($temp->id);
        }
    }

    function getChild($smallId) {
        $temps = $this->child;

        foreach($temps as $temp) {
            if ($temp->id = $smallId) {
                return $temp;
            }
        }

        return false;
    }
    
    public static function open($smallId) {
        $result = DB::update('update schedule set status = "Open" where nhan_quyen = ? and status = "Close" ', [$smallId]);

        if ($result) {
            return true;
        }
        return false;
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
