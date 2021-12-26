<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class detail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $result = DB::select('select sche_id from schedule 
                            inner join admin on admin.id = schedule.nhan_quyen
                            where position = "b1"');
        
        foreach($result as $re) {
            DB::table('gender_detail')->insert([
                "gender" => 1,
                "schedule" => $re->sche_id,
                "quantity" => rand(1, 3)
            ]);
        }
        
        

        foreach($result as $re) {
            DB::table('gender_detail')->insert([
                "gender" => 2,
                "schedule" => $re->sche_id,
                "quantity" => rand(2, 3)
            ]);
        }
        

        foreach($result as $re) {
            DB::table('level_detail')->insert([
                "level" => 1,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 2)
            ]);
        }

        foreach($result as $re) {
            DB::table('level_detail')->insert([
                "level" => 2,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 2)
            ]);
        }

        foreach($result as $re) {
            DB::table('level_detail')->insert([
                "level" => 3,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 2)
            ]);
        }

        foreach($result as $re) {
            DB::table('level_detail')->insert([
                "level" => 4,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 2)
            ]);
        }

        foreach($result as $re) {
            DB::table('level_detail')->insert([
                "level" => 5,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 2)
            ]);
        }

        foreach($result as $re) {
            DB::table('level_detail')->insert([
                "level" => 6,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 2)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 1,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 2,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 3,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 4,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 5,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 6,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 7,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 8,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 9,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 10,
                "schedule" => $re->sche_id,
                "quantity" => rand(0, 1)
            ]);
        }

        foreach($result as $re) {
            DB::table('job_detail')->insert([
                "job" => 11,
                "schedule" => $re->sche_id,
                "quantity" => rand(1, 2)
            ]);
        }
        
    }
}
