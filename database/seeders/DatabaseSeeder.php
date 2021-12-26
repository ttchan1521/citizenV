<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'id' => '0',
            'name' => 'Bộ Y tế',
            'Password' => md5('12345'),
            'position' => 'a1'
        ]);
        // 
        DB::table('admin')->insert([
            'id' => '01',
            'name' => 'An Giang',
            'Password' => md5('12345'),
            'boss' => '0',
            'position' => 'a2'
        ]);
        DB::table('admin')->insert([
            'id' => '0101',
            'name' => 'An Phú',
            'Password' => md5('12345'),
            'boss' => '01',
            'position' => 'a3'
        ]);
        DB::table('admin')->insert([
            'id' => '010101',
            'name' => 'Thị Trấn An Phú',
            'Password' => md5('12345'),
            'boss' => '0101',
            'position' => 'b1'
        ]);
        DB::table('admin')->insert([
            'id' => '01010101',
            'name' => 'An Hưng',
            'Password' => md5('12345'),
            'boss' => '010101',
            'position' => 'b2'
        ]);
        
        DB::table('admin')->insert([
            'id' => '02',
            'name' => 'Ninh Thuận',
            'Password' => md5('12345'),
            'boss' => '0',
            'position' => 'a2'
        ]);
        
        
        // Tỉnh 2 Ninh Thuận đầy đủ
        DB::table('admin')->insert([
            'id' => '0201',
            'name' => 'Huyện Bác Ái',
            'Password' => md5('12345'),
            'boss' => '02',
            'position' => 'a3'
        ]);
        DB::table('admin')->insert([
            'id' => '0202',
            'name' => 'Huyện Ninh Hải',
            'Password' => md5('12345'),
            'boss' => '02',
            'position' => 'a3'
        ]);
        DB::table('admin')->insert([
            'id' => '0203',
            'name' => 'Huyện Ninh Phước',
            'Password' => md5('12345'),
            'boss' => '02',
            'position' => 'a3'
        ]);
        DB::table('admin')->insert([
            'id' => '0204',
            'name' => 'Huyện Ninh Sơn',
            'Password' => md5('12345'),
            'boss' => '02',
            'position' => 'a3'
        ]);
        DB::table('admin')->insert([
            'id' => '0205',
            'name' => 'Huyện Thuận Bắc',
            'Password' => md5('12345'),
            'boss' => '02',
            'position' => 'a3'
        ]);
        DB::table('admin')->insert([
            'id' => '0206',
            'name' => 'Huyện Thuận Nam',
            'Password' => md5('12345'),
            'boss' => '02',
            'position' => 'a3'
        ]);
        DB::table('admin')->insert([
            'id' => '0207',
            'name' => 'Thành Phố Phan Rang - Tháp Chàm',
            'Password' => md5('12345'),
            'boss' => '02',
            'position' => 'a3'
        ]);
            // Các xã(Huyện 1)
            DB::table('admin')->insert([
                'id' => '020101',
                'name' => 'Xã Phước Bình',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020102',
                'name' => 'Xã Phước Chính',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020103',
                'name' => 'Xã Phước Đại',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020104',
                'name' => 'Xã Phước Hòa',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020105',
                'name' => 'Xã Phước Tân',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020106',
                'name' => 'Xã Phước Thắng',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020107',
                'name' => 'Xã Phước Thành',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020108',
                'name' => 'Xã Phước Tiến',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            DB::table('admin')->insert([
                'id' => '020109',
                'name' => 'Xã Phước Trung',
                'Password' => md5('12345'),
                'boss' => '0201',
                'position' => 'b1'
            ]);
            // các xóm (Xã 1)
            DB::table('admin')->insert([
                'id' => '02010101',
                'name' => 'Bậc Rây 1',
                'Password' => md5('12345'),
                'boss' => '020101',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010102',
                'name' => 'Bậc Rây 2',
                'Password' => md5('12345'),
                'boss' => '020101',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010103',
                'name' => 'Bậc Lang',
                'Password' => md5('12345'),
                'boss' => '020101',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010104',
                'name' => 'Gia É',
                'Password' => md5('12345'),
                'boss' => '020101',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010105',
                'name' => 'Hành Rang 1',
                'Password' => md5('12345'),
                'boss' => '020101',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010106',
                'name' => 'Hành Rang 2',
                'Password' => md5('12345'),
                'boss' => '020101',
                'position' => 'b2'
            ]);
            // 
            DB::table('admin')->insert([
                'id' => '02010201',
                'name' => 'Núi Rây',
                'Password' => md5('12345'),
                'boss' => '020102',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010301',
                'name' => 'Ma Hoa',
                'Password' => md5('12345'),
                'boss' => '020103',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010401',
                'name' => 'Tà Lú',
                'Password' => md5('12345'),
                'boss' => '020104',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010501',
                'name' => 'Ma Lâm',
                'Password' => md5('12345'),
                'boss' => '020105',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010601',
                'name' => 'Đá Trắng',
                'Password' => md5('12345'),
                'boss' => '020106',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010701',
                'name' => 'Đá Bàn',
                'Password' => md5('12345'),
                'boss' => '020107',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010801',
                'name' => 'Suối Đá',
                'Password' => md5('12345'),
                'boss' => '020108',
                'position' => 'b2'
            ]);
            DB::table('admin')->insert([
                'id' => '02010901',
                'name' => 'Tham Dú',
                'Password' => md5('12345'),
                'boss' => '020109',
                'position' => 'b2'
            ]);
            // 
            DB::table('admin')->insert([
                'id' => '020201',
                'name' => 'Xã Hộ Hải',
                'Password' => md5('12345'),
                'boss' => '0202',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '020301',
                'name' => 'Xã An Hải',
                'Password' => md5('12345'),
                'boss' => '0203',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '020401',
                'name' => 'Xã Lâm Sơn',
                'Password' => md5('12345'),
                'boss' => '0204',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '020501',
                'name' => 'Xã Lợi Hại',
                'Password' => md5('12345'),
                'boss' => '0205',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '020601',
                'name' => 'Xã Cà Ná',
                'Password' => md5('12345'),
                'boss' => '0206',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '020701',
                'name' => 'Xã Thành Hải',
                'Password' => md5('12345'),
                'boss' => '0207',
                'position' => 'a2'
            ]);
            // xóm 
            DB::table('admin')->insert([
                'id' => '02020101',
                'name' => 'Cà Đú',
                'Password' => md5('12345'),
                'boss' => '020201',
                'position' => 'a3'
            ]);
            DB::table('admin')->insert([
                'id' => '02030101',
                'name' => 'Hòa Thạch',
                'Password' => md5('12345'),
                'boss' => '020301',
                'position' => 'a3'
            ]);
            DB::table('admin')->insert([
                'id' => '02040101',
                'name' => 'Lâm Bình',
                'Password' => md5('12345'),
                'boss' => '020401',
                'position' => 'a3'
            ]);
            DB::table('admin')->insert([
                'id' => '02050101',
                'name' => 'A',
                'Password' => md5('12345'),
                'boss' => '020501',
                'position' => 'a4'
            ]);
            DB::table('admin')->insert([
                'id' => '02060101',
                'name' => 'B',
                'Password' => md5('12345'),
                'boss' => '020601',
                'position' => 'a3'
            ]);
            DB::table('admin')->insert([
                'id' => '02070101',
                'name' => 'C',
                'Password' => md5('12345'),
                'boss' => '020701',
                'position' => 'a3'
            ]);
            // 61 tỉnh còn lại
            DB::table('admin')->insert([
                'id' => '03',
                'name' => 'Bắc Giang',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '04',
                'name' => 'Bắc Kạn',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '05',
                'name' => 'Bạc Liêu',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '06',
                'name' => 'Bắc Ninh',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '07',
                'name' => 'Bến Tre',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '08',
                'name' => 'Bình Định',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '09',
                'name' => 'Bình Dương',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '10',
                'name' => 'Bình Phước',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '11',
                'name' => 'Bình Thuận',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '12',
                'name' => 'Cà Mau',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '13',
                'name' => 'Cần Thơ',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '14',
                'name' => 'Cao Bằng',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '15',
                'name' => 'Đà Nẵng',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '16',
                'name' => 'Đắk Lắk',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '17',
                'name' => 'Đắk Nông',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '18',
                'name' => 'Điện Biên',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '19',
                'name' => 'Đồng Nai',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '20',
                'name' => 'Đồng Tháp',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '21',
                'name' => 'Gia Lai',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '22',
                'name' => 'Hà Giang',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '23',
                'name' => 'Hà Nam',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '24',
                'name' => 'Hà Nội',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '25',
                'name' => 'Hà Tĩnh',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '26',
                'name' => 'Hải Dương',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '27',
                'name' => 'Hải Phòng',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '28',
                'name' => 'Hậu Giang',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '29',
                'name' => 'Hòa Bình',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '30',
                'name' => 'Hưng Yên',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '31',
                'name' => 'Khánh Hòa',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '32',
                'name' => 'Kiên Giang',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '33',
                'name' => 'Kon Tum',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '34',
                'name' => 'Lai Châu',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '35',
                'name' => 'Lâm Đồng',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '36',
                'name' => 'Lạng Sơn',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '37',
                'name' => 'Lào Cai',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '38',
                'name' => 'Long An',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '39',
                'name' => 'Nam Định',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '40',
                'name' => 'Nghệ An',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '41',
                'name' => 'Ninh Bình',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '42',
                'name' => 'Bà Rịa  Vũng Tàu',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '43',
                'name' => 'Phú Thọ',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '44',
                'name' => 'Phú Yên',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '45',
                'name' => 'Quảng Bình',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '46',
                'name' => 'Quảng Nam',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '47',
                'name' => 'Quảng Ngãi',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '48',
                'name' => 'Quảng Ninh',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '49',
                'name' => 'Quảng Trị',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '50',
                'name' => 'Sóc Trăng',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '51',
                'name' => 'Sơn La',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '52',
                'name' => 'Tây Ninh',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '53',
                'name' => 'Thái Bình',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '54',
                'name' => 'Thái Nguyên',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '55',
                'name' => 'Thanh Hóa',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '56',
                'name' => 'Thừa Thiên Huế',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '57',
                'name' => 'Tiền Giang',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '58',
                'name' => 'Thành phố Hồ Chí Minh',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '59',
                'name' => 'Trà Vinh',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '60',
                'name' => 'Tuyên Quang',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '61',
                'name' => 'Vĩnh Long',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '62',
                'name' => 'Vĩnh Phúc',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            DB::table('admin')->insert([
                'id' => '63',
                'name' => 'Yên Bái',
                'Password' => md5('12345'),
                'boss' => '0',
                'position' => 'a2'
            ]);
            
            //  huyện
            DB::table('admin')->insert([
                'id' => '0301',
                'name' => 'q',
                'Password' => md5('12345'),
                'boss' => '03',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '0401',
                'name' => 'w',
                'Password' => md5('12345'),
                'boss' => '04',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '0501',
                'name' => 'e',
                'Password' => md5('12345'),
                'boss' => '05',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '0601',
                'name' => 'r',
                'Password' => md5('12345'),
                'boss' => '06',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '0701',
                'name' => 't',
                'Password' => md5('12345'),
                'boss' => '07',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '0801',
                'name' => 'y',
                'Password' => md5('12345'),
                'boss' => '08',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '0901',
                'name' => 'u',
                'Password' => md5('12345'),
                'boss' => '09',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1001',
                'name' => 'i',
                'Password' => md5('12345'),
                'boss' => '10',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1101',
                'name' => 'o',
                'Password' => md5('12345'),
                'boss' => '11',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1201',
                'name' => 'p',
                'Password' => md5('12345'),
                'boss' => '12',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1301',
                'name' => 'a',
                'Password' => md5('12345'),
                'boss' => '13',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1401',
                'name' => 's',
                'Password' => md5('12345'),
                'boss' => '14',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1501',
                'name' => 'd',
                'Password' => md5('12345'),
                'boss' => '15',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1601',
                'name' => 'd',
                'Password' => md5('12345'),
                'boss' => '16',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1701',
                'name' => 'f',
                'Password' => md5('12345'),
                'boss' => '17',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1801',
                'name' => 'g',
                'Password' => md5('12345'),
                'boss' => '18',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '1901',
                'name' => 'h',
                'Password' => md5('12345'),
                'boss' => '19',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2001',
                'name' => 'j',
                'Password' => md5('12345'),
                'boss' => '20',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2101',
                'name' => 'k',
                'Password' => md5('12345'),
                'boss' => '21',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2201',
                'name' => 'l',
                'Password' => md5('12345'),
                'boss' => '22',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2301',
                'name' => 'z',
                'Password' => md5('12345'),
                'boss' => '23',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2401',
                'name' => 'x',
                'Password' => md5('12345'),
                'boss' => '24',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2501',
                'name' => 'c',
                'Password' => md5('12345'),
                'boss' => '25',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2601',
                'name' => 'v',
                'Password' => md5('12345'),
                'boss' => '26',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2701',
                'name' => 'b',
                'Password' => md5('12345'),
                'boss' => '27',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2801',
                'name' => 'n',
                'Password' => md5('12345'),
                'boss' => '28',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '2901',
                'name' => 'm',
                'Password' => md5('12345'),
                'boss' => '29',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3001',
                'name' => 'qw',
                'Password' => md5('12345'),
                'boss' => '30',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3101',
                'name' => 'qe',
                'Password' => md5('12345'),
                'boss' => '31',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3201',
                'name' => 'qr',
                'Password' => md5('12345'),
                'boss' => '32',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3301',
                'name' => 'qt',
                'Password' => md5('12345'),
                'boss' => '33',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3401',
                'name' => 'qy',
                'Password' => md5('12345'),
                'boss' => '34',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3501',
                'name' => 'qu',
                'Password' => md5('12345'),
                'boss' => '35',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3601',
                'name' => 'qi',
                'Password' => md5('12345'),
                'boss' => '36',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3701',
                'name' => 'qo',
                'Password' => md5('12345'),
                'boss' => '37',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3801',
                'name' => 'qp',
                'Password' => md5('12345'),
                'boss' => '38',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '3901',
                'name' => 'qa',
                'Password' => md5('12345'),
                'boss' => '39',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4001',
                'name' => 'qs',
                'Password' => md5('12345'),
                'boss' => '40',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4101',
                'name' => 'qd',
                'Password' => md5('12345'),
                'boss' => '41',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4201',
                'name' => 'qf',
                'Password' => md5('12345'),
                'boss' => '42',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4301',
                'name' => 'qg',
                'Password' => md5('12345'),
                'boss' => '43',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4401',
                'name' => 'qh',
                'Password' => md5('12345'),
                'boss' => '44',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4501',
                'name' => 'qj',
                'Password' => md5('12345'),
                'boss' => '45',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4601',
                'name' => 'qk',
                'Password' => md5('12345'),
                'boss' => '46',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4701',
                'name' => 'ql',
                'Password' => md5('12345'),
                'boss' => '47',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4801',
                'name' => 'qz',
                'Password' => md5('12345'),
                'boss' => '48',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '4901',
                'name' => 'qx',
                'Password' => md5('12345'),
                'boss' => '49',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5001',
                'name' => 'qc',
                'Password' => md5('12345'),
                'boss' => '50',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5101',
                'name' => 'qv',
                'Password' => md5('12345'),
                'boss' => '51',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5201',
                'name' => 'qb',
                'Password' => md5('12345'),
                'boss' => '52',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5301',
                'name' => 'qn',
                'Password' => md5('12345'),
                'boss' => '53',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5401',
                'name' => 'qm',
                'Password' => md5('12345'),
                'boss' => '54',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5501',
                'name' => 'wq',
                'Password' => md5('12345'),
                'boss' => '55',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5601',
                'name' => 'ww',
                'Password' => md5('12345'),
                'boss' => '56',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5701',
                'name' => 'we',
                'Password' => md5('12345'),
                'boss' => '57',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5801',
                'name' => 'wr',
                'Password' => md5('12345'),
                'boss' => '58',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '5901',
                'name' => 'wt',
                'Password' => md5('12345'),
                'boss' => '59',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '6001',
                'name' => 'wy',
                'Password' => md5('12345'),
                'boss' => '60',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '6101',
                'name' => 'wu',
                'Password' => md5('12345'),
                'boss' => '61',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '6201',
                'name' => 'wi',
                'Password' => md5('12345'),
                'boss' => '62',
                'position' => 'a3'
                ]);
                DB::table('admin')->insert([
                'id' => '6301',
                'name' => 'wo',
                'Password' => md5('12345'),
                'boss' => '63',
                'position' => 'a3'
                ]);
                // Xa
                DB::table('admin')->insert([
                    'id' => '030101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '0301',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '040101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '0401',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '050101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '0501',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '060101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '0601',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '070101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '0701',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '080101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '0801',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '090101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '0901',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '100101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1001',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '110101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1101',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '120101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1201',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '130101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1301',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '140101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1401',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '150101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1501',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '160101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1601',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '170101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1701',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '180101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1801',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '190101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '1901',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '200101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2001',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '210101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2101',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '220101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2201',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '230101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2301',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '240101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2401',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '250101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2501',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '260101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2601',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '270101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2701',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '280101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2801',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '290101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '2901',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '300101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3001',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '310101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3101',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '320101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3201',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '330101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3301',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '340101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3401',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '350101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3501',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '360101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3601',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '370101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3701',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '380101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3801',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '390101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '3901',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '400101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4001',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '410101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4101',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '420101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4201',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '430101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4301',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '440101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4401',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '450101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4501',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '460101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4601',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '470101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4701',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '480101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4801',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '490101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '4901',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '500101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5001',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '510101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5101',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '520101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5201',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '530101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5301',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '540101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5401',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '550101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5501',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '560101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5601',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '570101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5701',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '580101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5801',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '590101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '5901',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '600101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '6001',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '610101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '6101',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '620101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '6201',
                    'position' => 'b1'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '630101',
                    'name' => 'ddd',
                    'Password' => md5('12345'),
                    'boss' => '6301',
                    'position' => 'b1'
                    ]);
                // xóm
                DB::table('admin')->insert([
                    'id' => '03010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '030101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '04010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '040101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '05010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '050101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '06010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '060101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '07010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '070101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '08010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '080101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '09010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '090101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '10010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '100101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '11010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '110101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '12010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '120101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '13010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '130101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '14010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '140101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '15010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '150101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '16010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '160101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '17010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '170101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '18010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '180101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '19010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '190101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '20010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '200101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '21010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '210101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '22010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '220101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '23010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '230101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '24010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '240101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '25010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '250101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '26010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '260101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '27010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '270101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '28010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '280101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '29010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '290101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '30010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '300101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '31010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '310101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '32010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '320101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '33010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '330101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '34010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '340101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '35010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '350101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '36010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '360101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '37010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '370101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '38010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '380101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '39010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '390101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '40010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '400101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '41010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '410101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '42010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '420101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '43010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '430101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '44010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '440101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '45010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '450101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '46010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '460101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '47010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '470101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '48010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '480101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '49010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '490101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '50010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '500101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '51010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '510101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '52010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '520101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '53010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '530101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '54010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '540101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '55010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '550101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '56010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '560101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '57010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '570101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '58010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '580101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '59010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '590101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '60010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '600101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '61010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '610101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '62010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '620101',
                    'position' => 'b2'
                    ]);
                    DB::table('admin')->insert([
                    'id' => '63010101',
                    'name' => 'dddxxxxxx',
                    'Password' => md5('12345'),
                    'boss' => '630101',
                    'position' => 'b2'
                    ]);
                    







    }
}
