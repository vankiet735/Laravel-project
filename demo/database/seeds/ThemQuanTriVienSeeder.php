<?php

use Illuminate\Database\Seeder;
use App\QuanTriVien;
use Illuminate\Support\Facades\Hash;
class ThemQuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dsQTV=[
        ['ten_dang_nhap'=>'admin01','mat_khau'=>Hash::make('123456'),'ho_ten'=>"QTV01"],
        ['ten_dang_nhap'=>'admin02','mat_khau'=>Hash::make('123456'),'ho_ten'=>"QTV02"],
        ];
        foreach ($dsQTV as $quantrivien) {
        	QuanTriVien::create($quantrivien);
        }
    }
}
