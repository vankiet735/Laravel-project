<?php

use Illuminate\Database\Seeder;
use App\NguoiChoi;
use Illuminate\Support\Facades\Hash;
class ThemNguoiChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for((int) $i=0;$i<200;$i++){
    		NguoiChoi::create(
    			["ten_dang_nhap"=>"player".$i,
    			"mat_khau"=>Hash::make("123456"),
    			"email"=>"player".$i."@gmail.com",
    			"hinh_dai_dien"=>"player".$i.".jpeg",
    			"diem_cao_nhat"=>rand(0,9999),
    			"credit"=>rand(0,9999)
    			]
    		);
    	}

    }
}
