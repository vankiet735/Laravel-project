<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('danh-muc-cau-hoi','API\CauHoiController@layDanhSachCauHoi');
Route::get('cau-hoi','API\CauHoiController@LayCauHoi');

Route::get('ds-linh-vuc','API\LinhVucController@LayDanhSach');
Route::get('linh-vuc-random','API\LinhVucController@Random_4_LinhVuc');

Route::get('nguoi-choi','API\NguoiChoiController@layDanhSach');

Route::post('dang-nhap','API\LoginController@dangNhap');

Route::middleware(['assign.guard:api','jwt.auth'])->group(function(){
	Route::get('lay-thong-tin','API\LoginController@layThongTin');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
