<?php

use Illuminate\Database\Seeder;
use App\Chi_Tiet_Luot_Choi;
class ChiTietLuotChoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dsluotchoi=[
        ['nguoi_choi_id'=>'2','so_cau_dung'=>'5','diem'=>'500'],
        ['nguoi_choi_id'=>'5','so_cau_dung'=>'15','diem'=>'1500'],
        ['nguoi_choi_id'=>'7','so_cau_dung'=>'25','diem'=>'2500'],
        ['nguoi_choi_id'=>'17','so_cau_dung'=>'7','diem'=>'70'],
        ['nguoi_choi_id'=>'22','so_cau_dung'=>'11','diem'=>'1100'],
        ['nguoi_choi_id'=>'27','so_cau_dung'=>'24','diem'=>'2400'],
        ['nguoi_choi_id'=>'69','so_cau_dung'=>'30','diem'=>'3000'],
        ['nguoi_choi_id'=>'72','so_cau_dung'=>'26','diem'=>'2600'],
        ['nguoi_choi_id'=>'123','so_cau_dung'=>'2','diem'=>'200'],
        ['nguoi_choi_id'=>'152','so_cau_dung'=>'5','diem'=>'500'],
        ];
        foreach ($dsluotchoi as $luotchoi) {
        	Chi_Tiet_Luot_Choi::create($luotchoi);
        }
    }
}
