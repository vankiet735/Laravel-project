<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('linh-vuc', function () {
//     return view('ds-linh-vuc');
// });
// 
// Route::get('linh-vuc/them-moi',function(){
// 	return view('form-linh-vuc');
// });
Route::prefix('linh-vuc')->group(function(){
	Route::get('/','LinhVucController@index')->name('linh-vuc.danh-sach');
	Route::get('them-moi','LinhVucController@create')->name('linh-vuc.them-moi');
	Route::post('them-moi','LinhVucController@store')->name('linh-vuc.xl-them-moi');
	Route::get('cap-nhat/{id}','LinhVucController@edit')->name('linh-vuc.cap-nhat');
	Route::post('cap-nhat/{id}','LinhVucController@update')->name('linh-vuc.xu-ly-cap-nhat');
	Route::get('xoa/{id}','LinhVucController@destroy')->name('linh-vuc.xoa');
	Route::get('dstrash','LinhVucController@get_trash')->name('linh-vuc.dstrash');
	Route::get('restore/{id}','LinhVucController@restore_linhvuc')->name('linh-vuc.restore');
	Route::get('delete-trash/{id}','LinhVucController@delete_trash')->name('linh-vuc.delete-trash');
});

Route::prefix('cau-hoi')->group(function(){
	Route::get('/','CauHoiController@index')->name('cau-hoi.danh-sach');
	Route::get('them-moi','CauHoiController@create')->name('cau-hoi.them-moi');
	Route::post('them-moi','CauHoiController@store')->name('cau-hoi.xl-them-moi');
	Route::get('cap-nhat/{id}','CauHoiController@edit')->name('cau-hoi.cap-nhat');
	Route::post('cap-nhat/{id}','CauHoiController@update')->name('cau-hoi.xu-ly-cap-nhat');
	Route::get('xoa/{id}','CauHoiController@destroy')->name('cau-hoi.xoa');
	Route::get('dstrash','CauHoiController@get_trash')->name('cau-hoi.dstrash');
	Route::get('restore/{id}','CauHoiController@restore_cauhoi')->name('cau-hoi.restore');
	Route::get('delete-trash/{id}','CauHoiController@delete_trash')->name('cau-hoi.delete-trash');
});

Route::prefix('nguoi-choi')->group(function(){
	Route::get('/','NguoiChoiController@index')->name('nguoi-choi.danh-sach');
	Route::get('them-moi','NguoiChoiController@create')->name('nguoi-choi.them-moi');
	Route::post('them-moi','NguoiChoiController@store')->name('nguoi-choi.xl-them-moi');
	Route::get('xoa/{id}','NguoiChoiController@destroy')->name('nguoi-choi.xoa');
	Route::get('dstrash','NguoiChoiController@get_trash')->name('nguoi-choi.dstrash');
	Route::get('restore/{id}','NguoiChoiController@restore_nguoichoi')->name('nguoi-choi.restore');
	Route::get('delete-trash/{id}','NguoiChoiController@delete_trash')->name('nguoi-choi.delete-trash');
});
Route::prefix('goi-credit')->group(function(){
	Route::get('/','GoiCreditController@index')->name('goi-credit.danh-sach');
	Route::post('/them-moi','GoiCreditController@store')->name('goi-credit.xl-them-moi');
	Route::get('cap-nhat/{id}','GoiCreditController@edit')->name('goi-credit.cap-nhat');
	Route::post('cap-nhat/{id}','GoiCreditController@update')->name('goi-credit.xl-cap-nhat');
	Route::get('xoa/{id}','GoiCreditController@destroy')->name('goi-credit.xoa');
	Route::get('dstrash','GoiCreditController@get_trash')->name('goi-credit.dstrash');
	Route::get('restore/{id}','GoiCreditController@restore_goi_credit')->name('goi-credit.restore');
	Route::get('delete-trash/{id}','GoiCreditController@delete_trash')->name('goi-credit.delete-trash');
});