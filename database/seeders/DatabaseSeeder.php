<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('admin')->insert([
            'id' => '0',
            'name' => 'Bộ Y tế',
            'password' => md5('12345'),
            'position' => 'a1'
        ]);

        DB::table('admin')->insert([
            'id' => '01',
            'name' => 'Hà Nội',
            'password' => md5('12345'),
            'boss' => '0',
            'position' => 'a2'
        ]);
    }
}
