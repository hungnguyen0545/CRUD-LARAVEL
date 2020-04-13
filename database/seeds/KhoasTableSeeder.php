<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khoas')->insert(
            ['id' => 1,'tenkhoa' => 'Khoa Khoa học máy tính']
        );
        DB::table('khoas')->insert(
            ['id' => 2,'tenkhoa' => 'Khoa Hệ thống thông tin']
        );
        DB::table('khoas')->insert(
            ['id' => 3,'tenkhoa' => 'Khoa Công nghệ Phần mềm']
        );
        DB::table('khoas')->insert(
            ['id' => 4,'tenkhoa' => 'Khoa Kỹ thuật Máy tính']
        );
        DB::table('khoas')->insert(
            ['id' => 5,'tenkhoa' => 'Khoa MMT và Truyền thông']
        );
        DB::table('khoas')->insert(
            ['id' => 6,'tenkhoa' => 'Khoa Khoa học và Kỹ thuật Thông tin']
        );
    }
}
