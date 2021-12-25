<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class schedule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $result = DB::select('select id from admin');
        
        DB::table('schedule')->insert([
            'nhan_quyen' => '02',
            'start_date' => '2020-06-01',
            'start_time' => '00:00:00',
            'end_date' => '2020-06-30',
            'end_time' => '00:00:00',
            'status' => 'Done',
            'sinh' => rand(0,1),
            'tu' => rand(0,1)
        ]);
        

        
        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2020-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2020-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
                'tu' => rand(0,1)
            ]);
        }
        

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2019-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2019-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2018-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2018-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2017-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2017-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2016-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2016-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2015-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2015-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2014-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2014-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2013-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2013-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2012-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2012-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }

        foreach($result as $re) {
            DB::table('schedule')->insert([
                'nhan_quyen' => $re->id,
                'start_date' => '2011-06-01',
                'start_time' => '00:00:00',
                'end_date' => '2011-06-30',
                'end_time' => '00:00:00',
                'status' => 'Done',
                'sinh' => rand(0,1),
            'tu' => rand(0,1)
            ]);
        }
    }
}
