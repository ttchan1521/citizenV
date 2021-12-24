<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class field extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job')->insert([
            'job_id' => '1',
            'job_name' => 'Cơ khí,Điện,Viễn thông'
        ]);
        DB::table('job')->insert([
            'job_id' => '2',
            'job_name' => 'Du lịch và dịch vụ'
        ]);
        DB::table('job')->insert([
            'job_id' => '3',
            'job_name' => 'Kế toán,Tài chính ngân hàng'
        ]);
        DB::table('job')->insert([
            'job_id' => '4',
            'job_name' => 'Kinh doanh,Marketing'
        ]);
        DB::table('job')->insert([
            'job_id' => '5',
            'job_name' => 'Kỹ thuật,Công nghệ'
        ]);
        DB::table('job')->insert([
            'job_id' => '6',
            'job_name' => 'Nông-Lâm-Thủy sản'
        ]);
        DB::table('job')->insert([
            'job_id' => '7',
            'job_name' => 'Pháp lý,Hành chính văn phòng'
        ]);
        DB::table('job')->insert([
            'job_id' => '8',
            'job_name' => 'Thủy điện,Xây dựng'
        ]);
        DB::table('job')->insert([
            'job_id' => '9',
            'job_name' => 'Giáo dục,Sư phạm'
        ]);
        DB::table('job')->insert([
            'job_id' => '10',
            'job_name' => 'Y Tế'
        ]);
        DB::table('job')->insert([
            'job_id' => '11',
            'job_name' => 'Ngành nghề khác'
        ]);
        // 
        DB::table('level')->insert([
            'level_id' => '1',
            'level_name' => 'Chưa bao giờ đi học'
        ]);
        DB::table('level')->insert([
            'level_id' => '2',
            'level_name' => 'Chưa tốt nghiệp tiểu học'
        ]);
        DB::table('level')->insert([
            'level_id' => '3',
            'level_name' => 'Tốt nghiệp tiểu học'
        ]);
        DB::table('level')->insert([
            'level_id' => '4',
            'level_name' => 'Tốt nghiệp THCS'
        ]);
        DB::table('level')->insert([
            'level_id' => '5',
            'level_name' => 'Tốt nghiệp THPT'
        ]);
        DB::table('level')->insert([
            'level_id' => '6',
            'level_name' => 'tốt nghiệp đại học trở lên'
        ]);
        // 
        DB::table('gender')->insert([
            'gender_id' => '1',
            'gender_name' => 'Nữ'
        ]);
        DB::table('gender')->insert([
            'gender_id' => '2',
            'gender_name' => 'Nam'
        ]);
        
        
        






    }
}

