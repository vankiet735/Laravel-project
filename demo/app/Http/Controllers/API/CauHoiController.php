<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;
class CauHoiController extends Controller
{
    public function layDanhSachCauHoi(){
    	$danhSach=CauHoi::all();
    	return $danhSach;
    }
    
    public function LayCauHoi(Request $request){
    	$linhVucID=$request->query('linh-vuc');
        $cauHoi=CauHoi::where('linh_vuc_id',$linhVucID)->get()->random(1);
        $result=[
                'success'=>true,
                'data'=>$cauHoi
        ];
        return response()->json($result);
    }
}
