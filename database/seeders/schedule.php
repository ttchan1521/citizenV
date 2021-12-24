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
        DB::table('schedule')->insert([
            'nhan_quyen' => '02',
            'start_date' => '2020-06-01',
            'start_time' => '00:00:00',
            'end_date' => '2020-06-30',
            'end_time' => '00:00:00',
            'status' => 'Done'
        ]);
    }
}
