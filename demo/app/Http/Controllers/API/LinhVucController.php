<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;
class LinhVucController extends Controller
{
    public function LayDanhSach(){
    	$dsLinhVuc=LinhVuc::all();
    	return $dsLinhVuc;
    }
    
    public function Random_4_LinhVuc(){
    	$dsLinhVuc=LinhVuc::all();
    	$dsLinhVuc->random(4);
    	$result=['success'=>true,
    			 'linhVuc'=>$dsLinhVuc
    	];
    	return response()->json($result);
    }
}
