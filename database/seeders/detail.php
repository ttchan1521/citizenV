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
        
    }
}
