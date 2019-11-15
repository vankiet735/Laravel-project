<?php

use Illuminate\Database\Seeder;
use App\GoiCredit;
class ThemGoiCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       GoiCredit::create([
        	"ten_goi"=>"goi_100",
        	"credit"=>"100",
        	"so_tien"=>"2000"
        ]);
        GoiCredit::create([
        	"ten_goi"=>"goi_200",
        	"credit"=>"200",
        	"so_tien"=>"3500"
        ]);
         GoiCredit::create([
        	"ten_goi"=>"goi_500",
        	"credit"=>"500",
        	"so_tien"=>"7000"
        ]);
         GoiCredit::create([
        	"ten_goi"=>"goi_700",
        	"credit"=>"700",
        	"so_tien"=>"9500"
        ]);
        GoiCredit::create([
        	"ten_goi"=>"goi_1000",
        	"credit"=>"1000",
        	"so_tien"=>"14000"
        ]);
    }
}
