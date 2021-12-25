<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\b1;
use Illuminate\Support\Facades\DB;

class b2 extends b1
{
    use HasFactory;

    public $indiId;

    public function __construct($id, $name) {
        $this->indiId = $id;
        $this->name = $name;
        $boss = DB::select('select boss from admin where id = ?', [$id]);
        if ($boss) {
            $this->id = $boss[0]->boss;
        }
    }

    function addCitizen($fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job) {
        $result = DB::insert('insert into citizen(fullname, birthdate, gender, hometown, address, hamlet, temporary_add, identity_num, ton_giao, education_level, job, update_by) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', 
                            [$fullname, $birthdate, $gender, $hometown, $address, $this->id, $temporary_add, $identity_num, $ton_giao, $education_level, $job, $this->indiId]);
        
        if ($result) {
            return true;
        }
        return false;
    }

    function updateCitizen($id, $fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job) {
        $result = DB::update('update citizen set fullname = ?, birthdate = ?, gender = ?, hometown = ?, address = ?, temporary_add = ?, identity_num = ?, ton_giao = ?, education_level = ?, job = ?, update_by = ? where citizen_id = ?', 
                            [$fullname, $birthdate, $gender, $hometown, $address, $temporary_add, $identity_num, $ton_giao, $education_level, $job, $this->indiId, $id]);
        
        if ($result) {
            return true;
        }
        return false;
    }
}
