<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function dangNhap(Request $request){
		$credentials=[
			'ten_dang_nhap'=>$request->ten_dang_nhap,
			'password'=>$request->mat_khau
		];
    	#chứng thực
		
		if(!$token=auth('api')->attempt($credentials))
		{
    		#sai ten dang nhap || mật khẩu
			return response()->json([
				'success'=>false,
				'message'=>'Unauthorized.'
			],401);
		}
		else
    		#chứng thực thành công
		{
			return response()->json([
				'success'=>true,
				'message'=>'Authorized.',
				'token'=>$token,
    			'type'=>'bearer',//có thể bỏ
    			'expires'=>auth('api')->factory()->getTTL()*60//có thể bỏ
    		],200);
		}
	}

	public function laythongtin(){
		return auth('api')->user();
	}

}
