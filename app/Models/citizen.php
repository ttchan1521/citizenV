<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class citizen extends Model
{
    use HasFactory;

    private $id;
    private $fullname;
    private $birthdate;
    private $gender;
    private $hometown;
    private $address;
    private $temporary_add;
    private $identity_num;
    private $ton_giao;
    private $education_level;
    private $job;

    public function __construct($id, $fullname, $birthdate, $gender, $hometown, $address = "", $temporary_add = "", 
                                $identity_num ="", $ton_giao ="", $education_level = "", $job = "") 
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->hometown = $hometown;
        $this->address = $address;
        $this->temporary_add = $temporary_add;
        $this->identity_num = $identity_num;
        $this->ton_giao = $ton_giao;
        $this->education_level = $education_level;
        $this->job = $job;

    }
    public static function load_info_Citizen($id) {
        $result = DB::select('select *, gender.gender_name, level.level_name, job.job_name  from citizen
        join gender on gender.gender_id = citizen.gender
        join job on job.job_id = citizen.job 
        join level on level.level_id = citizen.education_level
        where citizen_id = ?', [$id]);
        if ($result) {
            return $result;
        }

        return [];
    }
    public static function totalPopulation($id) {
        $result = DB::select('select count(citizen_id) from citizen 
        where hamlet LIKE ', "[$id%]");
        if ($result) {
            return $result;
        }

        return [];
    }
}
