<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\schedule;
use DateTime;
use DateInterval;

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
        $locals = DB::table('admin')->select('id', 'name', 'position')->where('boss', '=', $id)->get();
        //$locals = DB::select('select id, name, position from admin where boss = ?', [$id]);
        if ($locals) {
            foreach($locals as $local) {
                $smallAdd = new admin($local->id, $local->name);
                if ($local->position == "b1") {
                    $smallAdd = new b1($local->id, $local->name);
                }
                if ($local->position == "b2") {
                    $smallAdd = new b2($local->id, $local->name);
                }
                $this->child[] = $smallAdd;
                
            }
        }
        
        
        

        $citizen = DB::select('select C.citizen_id, C.hamlet, C.fullname, 
        xa_table.name as Xa, 
        huyen_table.name as Huyen, 
        tinh_table.name as Tinh
        FROM citizen C,
        (SELECT id, name FROM admin WHERE CHAR_LENGTH(id) = 6) xa_table,
        (SELECT id, name FROM admin WHERE CHAR_LENGTH(id) = 4) huyen_table,
        (SELECT id, name FROM admin WHERE CHAR_LENGTH(id) = 2) tinh_table
        WHERE SUBSTRING(C.hamlet, 1, 6) = xa_table.id
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

        foreach($temps as $temp) {
            $sche = $temp->getSchedule();
            $temp->start_time = $sche->start_time;
            $temp->start_date = $sche->start_date;
            $temp->end_date = $sche->end_date;
            $temp->end_time = $sche->end_time; 
            $temp->status = $sche->status;
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
        $result = DB::table('schedule')->where('status', 'Open')->where('nhan_quyen', $smallId)
                    ->update(array('status' => 'Close'));
        //$result = DB::update('update schedule set status = "Close" where nhan_quyen = ? and status = "Open" ', [$smallId]);
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

        foreach($this->child as $chi) {
            if ($chi->id == $smallId) {
                return $chi;
            }
        }
        

        return false;
    }

    public function getSchedule() {
        $schedule = new schedule();
        $now = Date("Y-m-d");
        $sche = DB::table('schedule')
                    ->select('sche_id', 'start_date', 'start_time', 'end_date', 'end_time', 'status')
                    ->where('nhan_quyen', $this->id)
                    ->where('end_date', '>', $now)->get();
        //$sche = DB::select('select sche_id, start_date, start_time, end_date, end_time, status from schedule where nhan_quyen = ? and end_date > ? limit 1', [$this->id, $now]);
        $schedule->sche_id = "";
        $schedule->start_date = "";
        $schedule->start_time = "";
        $schedule->end_date = "";
        $schedule->end_time = "";
        $schedule->status = "";

                 
        if (count($sche) > 0) {
            $schedule->sche_id = $sche[0]->sche_id;
            $schedule->start_date = $sche[0]->start_date;
            $schedule->start_time = $sche[0]->start_time;
            $schedule->end_date = $sche[0]->end_date;
            $schedule->end_time = $sche[0]->end_time;
            $schedule->status = $sche[0]->status;
        }

        return  $schedule;
    }
    
    function getTime() {
        
        $end = new DateTime("NOW");
        $start = new DateTime("NOW");
        
        $start->sub(new DateInterval('P20D'));

        $date = array();
        $month = array();
        for($i = $start; $i <= $end; $i->modify('+1 day')){
            $date[] = $i->format("Y-m-d");
            $month[] = $i->format("d/m");
        }

        return [$date, $month];

    }
    function getTotalCtzen() {
        $temps = $this->child;
        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getTotalCtzen();
        }
        return $total;
    }
    function getTotalPro() {
        $time = $this->getTime();
        $total = 0;
        foreach($time[0] as $ngay) {
            $total += $this->progress($ngay);
        }

        return $total;
    }

    function getEachPro() {
        $temps = $this->child;

        foreach ($temps as $temp) {
            $temp->local_id = $temp->id;
            $temp->local_name = $temp->name;
            $temp->total = $temp->getTotalPro();
        }

        return $temps;
    }

    function cmp($child1, $child2) {
        return $child1->total < $child2->total;
    }

    function getTenFast() {
        $temps = $this->getEachPro();
    
        usort($temps, array($this, 'cmp'));

        $i = 0;
        $local = array();
        foreach($temps as $temp) {
            $local[] = $temp;
            $i++;
            if ($i > 9) {
                break;
            }
        }
        return $local;
        
    }

    function cmpSlow($child1, $child2) {
        return $child1->total > $child2->total;
    }

    function getTenSlow() {
        $temps = $this->getEachPro();
    
        usort($temps, array($this, 'cmpSlow'));

        $i = 0;
        $local = array();
        foreach($temps as $temp) {
            $local[] = $temp;
            $i++;
            if ($i > 9) {
                break;
            }
        }
        return $local;
    }

    function getPro() {
        $time = $this->getTime();
        $data = [];
        foreach($time[0] as $ngay) {
            $data[] = $this->progress($ngay);
        }

        $time[] = $data;

        return $time;

    }
    function progress($time) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->progress($time);
        }

        return $total;
    }

    function progressEach($idChild) {
        

    }

    function getYear() {
        $now = date("Y");
        $year = array();
        for ($i=$now-10; $i<$now; $i++) {
	        $year[] = $i;
        }
        return [$year];
    }

    function getMale($year) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getMale($year);
        }

        return $total;
    }

    function getFemale($year) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getFemale($year);
        }

        return $total;
    }

    function quantity($year) {
        return $this->getFemale($year) + $this->getMale($year);
    }

    function quanEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->quantity($ye);
        }

        $year[] = $data;
        return $year;
    }

    function maleEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->getMale($ye);
        }

        $year[] = $data;
        return $year;
    }

    function femaleEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->getFemale($ye);
        }

        $year[] = $data;
        return $year;
    }

    function getSinh($year) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getSinh($year);
        }

        return $total;
    }

    function getTu($year) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getTu($year);
        }

        return $total;
    }

    function tuEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->getTu($ye);
        }

        $year[] = $data;
        return $year;
    }

    function sinhEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->getSinh($ye);
        }

        $year[] = $data;
        return $year;
    }

    function tuoiGender() {
        $arr = array();
        for ($i=0; $i<100; $i=$i+5) {
            $mem = [$i, $i+4];
            $arr[] = $mem;
        }

        return $arr;
    }

    function coCau($start, $end, $gender) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->coCau($start, $end, $gender);
        }

        return $total;
    }

    function getCocauNu() {
        $age = $this->tuoiGender();
        $arr = array();
        foreach ($age as $ag) {
            $arr[] = $this->coCau($ag[0], $ag[1], 1);
        }

        return $arr;
    }

    function getCocauNam() {
        $age = $this->tuoiGender();
        $arr = array();
        foreach ($age as $ag) {
            $arr[] = $this->coCau($ag[0], $ag[1], 2);
        }

        return $arr;
    }
    
    function getYoung($year) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getYoung($year);
        }

        return $total;

    }

    function getWork($year) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getWork($year);
        }

        return $total;
    }

    function getOld($year) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getOld($year);
        }

        return $total;
    }

    function youngEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->getYoung($ye);
        }

        $year[] = $data;
        return $year;
    }

    function workEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->getWork($ye);
        }

        $year[] = $data;
        return $year;
    }

    function oldEachYear() {
        $year = $this->getYear();
        $data = array();
        foreach($year[0] as $ye) {
            $data[] = $this->getOld($ye);
        }

        $year[] = $data;
        return $year;
    }

    function getLevel($year, $level) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getLevel($year, $level);
        }

        return $total;
    }

    function levelEachYear() {
        $year = $this->getYear();
        $data = array();

        for ($i=1; $i<=6; $i++) {
            $mem = array();
            foreach($year[0] as $ye) {
                $mem[] = $this->getLevel($ye, $i);
            }
            $data[] = $mem;
        }
        return $data;
    }

    function getJob($job) {
        $temps = $this->child;

        $total = 0;
        foreach($temps as $temp) {
            $total += $temp->getJob($job);
        }

        return $total;
    }

    function eachJob() {
        $data = array();

        for ($i=1; $i<=11; $i++) {
            $data[] = $this->getJob($i);
        }
        return $data;
    }

    public static function open($smallId) {
        $result = DB::table('schedule')->where('status', 'Close')->where('nhan_quyen', $smallId)
                    ->update(array('status' => 'Open'));
        //$result = DB::update('update schedule set status = "Open" where nhan_quyen = ? and status = "Close" ', [$smallId]);

        if ($result) {
            return true;
        }
        return false;
    }

    public static function addLocal($id, $name, $password, $boss, $position) {
        $password = md5($password);
        $local = DB::table('admin')->insert([
            'id' => $id,
            'name' => $name,
            'password' => $password,
            'boss' => $boss,
            'position' => $position
        ]);
        //$local = DB::insert('insert into admin(id, name, password, boss, position) values(?, ?, ?, ?, ?)', [$id, $name, $password, $boss, $position]);

        if ($local) {
            return true;
        }
        return [];
    }

    public static function deleteLocal($id) {

        $result = DB::table('admin')->where('id', $id)->delete();
        //$result = DB::delete('delete from admin where id = ?', [$id]);

        if ($result) {
            return true;
        }
        return false;
    }
}
